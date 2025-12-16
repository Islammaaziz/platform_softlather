<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\DonneesTechnique;
use App\Models\MaitreOuvrage;
use App\Models\MaitreOeuvre;
use App\Models\Surface;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use App\Models\Rapport;
use App\Notifications\RapportGenereNotification;
use Illuminate\Support\Facades\Auth;



class ProjetController extends Controller
{
   public function store(Request $request)
{
    // 1️⃣ Validation et création du projet, maître d'ouvrage, maître d’œuvre, données techniques, surfaces
    // (comme dans ton code actuel)
    
   // 1️⃣ Création du projet
$projet = Projet::create([
    'nom_projet'  => $request->projectTitle,
    'ref_interne' => $request->projectRef,
    'adresse'     => $request->projectAddress,
    'cp'          => $request->projectZip,
    'ville'       => $request->projectCity,
]);

// 2️⃣ Création du maître d'ouvrage
$projet->maitreOuvrage()->create([
    'nom'       => $request->moName,
    'prenom'    => $request->moFirstName,
    'adresse'   => $request->moAddress,
    'cp'        => $request->moZip,
    'ville'     => $request->moCity,
    'telephone' => $request->moPhone,
    'numero'    => $request->moNumber,
]);

// 3️⃣ Création du maître d’œuvre
$projet->maitreOeuvre()->create([
    'nom'       => $request->meName,
    'prenom'    => $request->meFirstName,
    'adresse'   => $request->meAddress,
    'cp'        => $request->meZip,
    'ville'     => $request->meCity,
    'telephone' => $request->mePhone,
    'numero'    => $request->meNumber,
]);

$totalSurface = 0;

foreach ($request->input('surface', []) as $s) {
    $totalSurface += floatval($s['value']);
}

// 4️⃣ Calcul de la Hauteur équivalente (m² → ha)
$coef_Ruiss = $request->coefRuiss ?? 1; // par défaut 1 si non défini
$Hauteur_equivalente = 360 * ($request->debitFuite * ($totalSurface / 10000))  / ($totalSurface * $coef_Ruiss / 10000);

// 5️⃣ Calcul de la Hauteur spécifique de stockage selon la zone et la période
$Hauteur_specifique_stockage = null;

switch($request->zoneInput) {
    case 'Zone 1':
        switch($request->periodeAns){
            case 2:  $Hauteur_specifique_stockage = 20.716 * pow($Hauteur_equivalente, -0.289); break;
            case 4:  $Hauteur_specifique_stockage = 27.259 * pow($Hauteur_equivalente, -0.267); break;
            case 10: $Hauteur_specifique_stockage = 33.784 * pow($Hauteur_equivalente, -0.26);  break;
            case 20: $Hauteur_specifique_stockage = 39.296 * pow($Hauteur_equivalente, -0.268); break;
        }
        break;

    case 'Zone 2':
        switch($request->periodeAns){
            case 2:  $Hauteur_specifique_stockage = 26.333 * pow($Hauteur_equivalente, -0.402); break;
            case 4:  $Hauteur_specifique_stockage = 33.741 * pow($Hauteur_equivalente, -0.375); break;
            case 10: $Hauteur_specifique_stockage = 42.616 * pow($Hauteur_equivalente, -0.356); break;
            case 20: $Hauteur_specifique_stockage = 48.927 * pow($Hauteur_equivalente, -0.339); break;
        }
        break;

    case 'Zone 3':
        switch($request->periodeAns){
            case 2: $Hauteur_specifique_stockage = 47.784 * pow($Hauteur_equivalente, -0.374); break;
            case 4:
                $Hauteur_specifique_stockage = $Hauteur_equivalente <= 2
                    ? 72.707 * pow($Hauteur_equivalente, -0.390)
                    : 68.279 * pow($Hauteur_equivalente, -0.329);
                break;
            case 10:
                if ($Hauteur_equivalente <= 2) {
                    $Hauteur_specifique_stockage = 105.64 * pow($Hauteur_equivalente, -0.398);
                } else {
                    $Hauteur_specifique_stockage = 97.345 * pow($Hauteur_equivalente, -0.284);
                }
                break;
            // Ajouter cas 20 si nécessaire
        }
        break;
}

// 6️⃣ Création des données techniques



$donneesTech = $projet->donneesTechnique()->create([
    'sitesurface'                 => $totalSurface,
    'debit_fuite'                 => $request->debitFuite,
    'periodeAns'                  => $request->periodeAns,
    'zoneInput'                   => $request->zoneInput,
    'coefRuiss'                   => $coef_Ruiss,
    'Hauteur_equivalente'         => $Hauteur_equivalente,
    'Hauteur_specifique_stockage' => $Hauteur_specifique_stockage,
]);

// 7️⃣ Gestion des surfaces additionnelles
$totalSurfaceActive = 0;
$totalSurface = 0;

foreach ($request->input('surface', []) as $s) {
    $surface = floatval($s['value']);   // surface normale
    $coef    = floatval($s['coef']);    // coefficient
    $surfaceActive = $surface * $coef;  // surface active

    $donneesTech->surfaces()->create([
        'type'           => $s['nature'],
        'surface'        => $surface,
        'coef_c'         => $coef,
        'typeSpecifique' => $s['type'],
        'surface_active' => $surfaceActive,
    ]);

    $totalSurfaceActive += $surfaceActive; // somme des surfaces actives
    $totalSurface += $surface;             // somme des surfaces normales
}

// calcul du coefficient global
$coefTotalRuiss = $totalSurface > 0 ? ($totalSurfaceActive / $totalSurface) : 0;


// 8️⃣ Mise à jour finale des données techniques
$donneesTech->update([
    'surface_active'   => $totalSurfaceActive,
    'coefRuiss' => $coefTotalRuiss,
    'volume'           => 10 * $Hauteur_specifique_stockage * $totalSurfaceActive/10000 ,
]);

// 9️⃣ Charger les relations pour affichage ou PDF
$projet->load([
    'maitreOuvrage',
    'maitreOeuvre',
    'donneesTechnique.surfaces',
]);

    // 7️⃣ Génération du PDF
  $pdf = Pdf::loadView('testrapport', ['projet' => $projet])
          ->setPaper('A4', 'portrait')
          ->setOption('defaultFont', 'DejaVu Sans');
    // 8️⃣ Nom et chemin du fichier
    $fileName = 'rapport_projet_'.$projet->id.'.pdf';
    $filePath = 'rapports/' . $fileName; // dossier storage/app/public/rapports

    // 9️⃣ Sauvegarde du PDF dans le storage
    Storage::disk('public')->put($filePath, $pdf->output());

    // 🔟 Enregistrement dans la base de données
    $rapport = Rapport::create([
            'projet_id'   => $projet->id,
            'nom_fichier' => $fileName,
            'chemin_pdf'  => 'storage/' . $filePath,
             'user_id'     => auth()->id(),
        ]);
        auth()->user()->notify(new RapportGenereNotification($rapport));

    // 1️⃣1️⃣ Téléchargement immédiat pour l’utilisateur
    return $pdf->download($fileName);
}


public function index()
{
    // Récupère tous les rapports de l'utilisateur connecté
    $rapports = Rapport::with(['user', 'projet'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

    return view('platformAvecAcce.Rapport', compact('rapports'));
}

public function historique()
{
   $notifications = Auth::user()->notifications()->latest()->get();
   

   

    return view('platformAvecAcce.historique', compact('notifications'));
}
}