<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modifier le profil - SoftLather</title>
  <link rel="icon" href="{{ asset('images/softlather.jpg') }}">
  <!-- Bootstrap & FontAwesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
   

    body { background:#f6f8fb; font-family:Inter, "Segoe UI", Roboto, Arial, sans-serif; color:#222; }
    .navbar { background: linear-gradient(90deg,var(--primary-2), var(--primary-1)); }
    .logo { height:40px; width:40px; border-radius:8px; object-fit:cover; margin-right:10px; }
    .page-title { color:var(--primary-1); font-weight:700; }
    .card { border:0; border-radius:12px; box-shadow:var(--card-shadow); }
    .card .card-header { background:linear-gradient(90deg,var(--primary-1),var(--primary-2)); color:#fff; border-top-left-radius:12px; border-top-right-radius:12px; }
    .section-hint { color:var(--muted); font-size:0.9rem; }
    label strong { color:#000; font-size:0.95rem; }
    .small-muted { color:var(--muted); font-size:0.85rem; }

    /* surfaces list */
    .surface-row { gap:8px; align-items:center; }
    .surface-row .form-control{ min-width:0; }

    /* result box */
    .summary-box { background:#fff; border-radius:10px; padding:16px; border:1px solid #e6eefc; }

    /* responsive tweaks */
    @media (max-width:575px){
      .surface-row { flex-direction:column; align-items:stretch; }
    }

    /* badge for required */
    .req { color:#e55353; margin-left:4px; font-weight:600; }

    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .logo-container img {
      width: 50px;
      height: 50px;
      border-radius: 8px;
    }
    .logo-container h1 {
      font-size: 1.9rem;
      margin: 0;
      font-weight: bold;
      color: #e0dfdf;
    }

    .card-header {
      background: linear-gradient(90deg, #4e73df 0%, #224abe 100%);
      color: white;
      text-align: center;
      padding: 1.2rem;
    }

    .form-control:focus {
      border-color: #4e73df;
      box-shadow: 0 0 4px rgba(78, 115, 223, 0.5);
    }

    .avatar-preview {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      border: 3px solid #4e73df;
      object-fit: cover;
      margin-bottom: 15px;
    }

    footer {
      background: #1a1a1a;
      color: white;
      text-align: center;
      padding: 30px 20px;
      margin-top: 50px;
    }

    footer a {
      color: white;
      text-decoration: none;
    }

    footer a:hover {
      color: #2e4ecc;
    }

    strong {
      color: #000;
      font-weight: bold;
      font-family: 'Arial', sans-serif;
      font-size: 1.1rem;
    }

    .container {
  max-width: 1100px;
}

.section-title {
  margin-top: 40px;
  margin-bottom: 25px;
  font-weight: 700;
  color: #2b3a67;
}

/* --- Cartes principales --- */
.card {
  border: none;
  border-radius: 14px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.08);
  background: #ffffff;
  overflow: hidden;
}

.card-header {
  background: linear-gradient(90deg, #4e73df 0%, #224abe 100%);
  color: #fff;
  font-weight: 600;
  font-size: 1rem;
  border: none;
  padding: 0.9rem 1.25rem;
}

.card-body {
  background-color: #f9fbfd;
  padding: 1.8rem;
  border-top: 1px solid #e5e9f2;
}

/* --- Champs de saisie --- */
.form-control, .form-select {
  border-radius: 8px;
  border: 1px solid #d1d9e6;
  transition: all 0.2s ease;
}

.form-control:focus, .form-select:focus {
  border-color: #4e73df;
  box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.25);
}

/* --- Labels --- */
.form-label strong {
  color: #1a1a1a;
  font-weight: 600;
}

/* --- Boutons --- */
.btn {
  border-radius: 10px;
  font-weight: 500;
  transition: all 0.2s ease;
}

.btn-success {
  background: linear-gradient(90deg, #28a745, #218838);
  border: none;
}

.btn-success:hover {
  background: linear-gradient(90deg, #218838, #1e7e34);
}

.btn-primary {
  background: linear-gradient(90deg, #4e73df, #224abe);
  border: none;
}

.btn-primary:hover {
  background: linear-gradient(90deg, #224abe, #1a3a9e);
}

.btn-outline-primary {
  color: #224abe;
  border-color: #224abe;
}

.btn-outline-primary:hover {
  background: #224abe;
  color: white;
}

/* --- Résumé --- */
.summary-box {
  background: #fefefe;
  border-left: 5px solid #4e73df;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 3px 8px rgba(0,0,0,0.05);
}

.summary-box h6 {
  color: #224abe;
  font-weight: 700;
}

/* --- Liste de surfaces --- */
.surface-row {
  background: #fff;
  border-radius: 8px;
  padding: 8px;
  box-shadow: 0 1px 4px rgba(0,0,0,0.05);
}

/* --- Carte France --- */
.zone-france-container {
  margin-top: 20px;
}

.carte-france {
  border: 2px solid #e0e0e0;
  border-radius: 12px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.carte-france:hover {
  transform: scale(1.06);
  box-shadow: 0 0 15px rgba(78, 115, 223, 0.4);
}

.tooltip-zone {
  background-color: rgba(78, 115, 223, 0.9);
  border-radius: 6px;
  font-weight: 500;
}

/* --- Footer (harmonisé) --- */
footer {
  background: #222;
  padding: 40px 0;
  color: #ccc;
  font-size: 0.95rem;
  margin-top: 60px;
}

  </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="logo-container">
                <img src="{{ asset('images/softlather.jpg') }}" alt="Logo Softlather">
                <a href="/" style="text-decoration:none; color:inherit;"> 
                  <h1>SoftLather</h1>
                </a> 
              </div>
          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link " href="{{route('platformtechnique')}}"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('calcul')}}"><i class="fa fa-calculator"></i> Calculs</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('Rapport')}}"><i class="fa fa-file-alt"></i> Rapports</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link position-relative" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell fa-lg"></i> Notification
                            <!-- Petit point rouge -->
                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="notificationDropdown" style="min-width: 350px;">
                             <h6 class="dropdown-header">Notifications récentes</h6>

    <div class="table-responsive" style="max-height: 250px; overflow-y:auto;">
        <table class="table table-sm table-hover mb-0">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                {{-- Notifications non lues en premier --}}
                @forelse($sharedNotifications as $notification)
                <tr>
                    <td>{{ $notification->data['message'] ?? 'Nouvelle notification' }}</td>
                    <td>
    {{ $notification->created_at->format('d/m/Y') }} 
    <strong>{{ $notification->created_at->format('H:i') }}</strong>
</td>
                </tr>
                @empty
                
                @endforelse

                {{-- Notifications lues --}}
               
            </tbody>
        </table>
    </div>

    <div class="dropdown-footer mt-2 text-center">
        <a href="" class="text-decoration-none">Voir toutes les notifications</a>
    </div>
</ul>
                    </li>
                   
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fa fa-user"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <!-- Lien vers le profil -->
                            <li>
                                <a class="dropdown-item" href="{{ route('voirprofil') }}">
                                    <i class="fa fa-id-badge"></i>voir profil
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fa fa-trash"></i> Supprimer mon compte
                                </a>
                            </li>
                    
                            <li><hr class="dropdown-divider"></li>
                    
                            <!-- Déconnexion -->
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fa fa-sign-out-alt"></i> Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

  
<div class="container pb-5">
    <div>
        <h2 class="section-title text-center">Bienvenue sur la page de calcul</h2> 
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form id="projectForm" class="mb-4" action="{{ route('projets.store') }}" method="POST">
        @csrf

        <!-- 1) Référence de projet -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-center p-4">
                        <div class="card mb-4">
                            <div class="card-header p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="fa fa-folder-open me-2"></i><strong>1. Référence de projet</strong></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <label class="form-label"><strong>Intitulé du projet <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="projectTitle" id="projectTitle" placeholder="Ex: Aménagement toits bâtiment A" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label"><strong>Référence interne <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="projectRef" id="projectRef" placeholder="Ref. projet" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label"><strong>Adresse <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="projectAddress" id="projectAddress" placeholder="Rue, numéro" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label"><strong>Code postal <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="projectZip" id="projectZip" placeholder="Ex: 75012" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label"><strong>Ville <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="projectCity" id="projectCity" placeholder="Ex: Paris" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2) Maître d'ouvrage -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-center p-4">
                        <div class="card mb-4">
                            <div class="card-header p-3 d-flex justify-content-between align-items-center">
                                <div><i class="fa fa-cogs me-2"></i><strong>2. Maître d'ouvrage</strong></div>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>Nom <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="moName" id="moName" placeholder="Nom" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>Prénom <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="moFirstName" id="moFirstName" placeholder="Prénom" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>Adresse <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="moAddress" id="moAddress" placeholder="Adresse" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label"><strong>Code postal <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="moZip" id="moZip" placeholder="CP" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label"><strong>Ville <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="moCity" id="moCity" placeholder="Ville" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>Téléphone <span class="req">*</span></strong></label>
                                        <input type="tel" class="form-control" name="moPhone" id="moPhone" placeholder="06 12 34 56 78" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>Numéro (ID client / SIRET) <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="moNumber" id="moNumber" placeholder="Numéro" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3) Maître d'œuvre -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-center p-4">
                        <div class="card mb-4">
                            <div class="card-header p-3 d-flex justify-content-between align-items-center">
                                <div><i class="fa fa-cogs me-2"></i><strong>3. Maître d'œuvre</strong></div>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>Nom <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="meName" id="meName" placeholder="Nom" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>Prénom <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="meFirstName" id="meFirstName" placeholder="Prénom" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>Adresse <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="meAddress" id="meAddress" placeholder="Adresse" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label"><strong>Code postal <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="meZip" id="meZip" placeholder="CP" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label"><strong>Ville <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="meCity" id="meCity" placeholder="Ville" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>Téléphone <span class="req">*</span></strong></label>
                                        <input type="tel" class="form-control" name="mePhone" id="mePhone" placeholder="06 12 34 56 78" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>Numéro (SIRET) <span class="req">*</span></strong></label>
                                        <input type="text" class="form-control" name="meNumber" id="meNumber" placeholder="Numéro" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4) Données techniques -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-center p-4">
                        <i class="fa fa-cogs me-2"></i><strong>4. Données techniques</strong>
                    </div>
                    
                    <div class="card-body">
                        <div class="row g-3 mb-3">
                            
                            <div class="col-md-4">
                                <label class="form-label"><strong>Débit de fuite (L/s) <span class="req">*</span></strong></label>
                                <input type="number" step="0.01" class="form-control" name="debitFuite" id="debitFuite" placeholder="Ex: 5" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><strong>Période (ans) <span class="req">*</span></strong></label>
                                <select id="periode" name="periodeAns" class="form-select" required>
                                    <option value="">-- Choisir --</option>
                                    <option value="2">2 ans</option>
                                    <option value="4">4 ans</option>
                                    <option value="10">10 ans</option>
                                    <option value="20">20 ans</option>
                                </select>
                            </div>
                        </div>

                        <!-- Zone hydrologique -->
                        <div class="text-center my-4">
                            <h5><strong>Région hydrologique <span class="req">*</span></strong></h5>
                            <div class="zone-france-container position-relative d-inline-block">
                                <img src="{{ asset('images/cartefrance.webp') }}" alt="Carte des zones de France" class="carte-france" id="carteFrance">
                                <div id="tooltipZone" class="tooltip-zone">Survolez une zone</div>
                            </div>
                            <p class="mt-3">
                                🗺️ <strong>Zone sélectionnée :</strong> 
                                <span id="zoneSelectionnee" class="fw-bold text-primary">Aucune</span>
                            </p>
                            <input type="hidden" id="zoneInput" name="zoneInput" required>
                        </div>

                        <!-- Type principal de surface -->
                        <div class="row g-3 mb-3">
                        
                            
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="button" class="btn btn-outline-primary w-100" id="addSurfaceBtn">
                                    <i class="fa fa-plus me-2"></i>Ajouter une surface
                                </button>
                            </div>
                        </div>

                        <div id="surfacesList" class="mb-3">
                            <!-- Surfaces supplémentaires devront aussi être required si ajoutées -->
                        </div>

                        <!-- Actions -->
                        <div class="d-flex gap-2">
              <button type="button" class="btn btn-success" id="previewBtn">
    <i class="fa fa-eye me-2"></i>voir resumer
</button>

    <button type="reset" class="btn btn-secondary">
        Réinitialiser
    </button>
    
</div>

<!-- Résumé → placé séparément pour corriger l'affichage -->
<div id="summary" class="d-none mt-4 p-4 border rounded shadow" style="background:#f8f9fa;">
    <h3 class="mb-3">📘 Résumé du projet</h3>
    <div id="summaryContent"></div>
</div>
  <div class="text-end mt-3">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save me-2"></i>Generer Rapport
            </button>
        </div>
    </div>
</form>
</div>
</div>
</div>

<style>
.carte-france {
    width: 300px;
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}
.carte-france:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px rgba(0,0,0,0.3);
}
.tooltip-zone {
    position: absolute;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: rgba(0, 0, 0, 0.75);
    color: white;
    padding: 5px 10px;
    border-radius: 8px;
    font-size: 0.9rem;
    opacity: 0;
    transition: opacity 0.2s ease;
    pointer-events: none;
}
.tooltip-zone.show {
    opacity: 1;
}
</style>

<script>









// Carte et zone
const carte = document.getElementById('carteFrance');
const tooltip = document.getElementById('tooltipZone');
const zoneText = document.getElementById('zoneSelectionnee');
const zoneInput = document.getElementById('zoneInput');

carte.addEventListener('mousemove', (e) => {
    const rect = carte.getBoundingClientRect();
    const y = e.clientY - rect.top;
    let zone = '';
    if (y < rect.height / 3) zone = 'Zone 1';
    else if (y < 2 * rect.height / 3) zone = 'Zone 2';
    else zone = 'Zone 3';
    tooltip.textContent = zone;
    tooltip.classList.add('show');
});

carte.addEventListener('mouseleave', () => tooltip.classList.remove('show'));

carte.addEventListener('click', (e) => {
    const rect = carte.getBoundingClientRect();
    const y = e.clientY - rect.top;
    let zone = '';
    if (y < rect.height / 3) zone = 'Zone 1';
    else if (y < 2 * rect.height / 3) zone = 'Zone 2';
    else zone = 'Zone 3';
    zoneText.textContent = zone;
    zoneInput.value = zone;
});
// Ajouter des surfaces dynamiques



// Supprimer les surfaces existantes si besoin (fonction déjà liée aux boutons)
document.querySelectorAll('.remove-surface').forEach(btn => {
    btn.addEventListener('click', function() {
        this.closest('.surface-row').remove();
    });
});


document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-surface')) {
        e.target.closest('.surface-row').remove();
    }
});

</script>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // --- Gestion des surfaces dynamiques ---
 document.addEventListener('DOMContentLoaded', function(){

  let surfaceIndex = 0;
  const surfacesList = document.getElementById('surfacesList');
  const addSurfaceBtn = document.getElementById('addSurfaceBtn');

  const optionsSpecifiques = {
      toiture:[
        {value:'toiture_etanche',text:'Toiture étanche'},
        {value:'toiture_vegetalisee_extensive',text:'Toiture végétalisée extensive'},
        {value:'toiture_vegetalisee_intensive',text:'Toiture végétalisée intensive'},
      ],
      espace_vert:[
        {value:'Jardins,espaces verts', text:'Jardins,espaces verts'},
        {value:'Pelouses entretenues', text:'Pelouses entretenues'},
      ],
      circulation:[
        {value:'beton,enrobés bitumineux,chaussées imperméables', text:'beton/enrobés bitumineux/chaussées imperméables'},
        {value:'Enrobé drainant / chaussée perméable', text:'Enrobé drainant / chaussée perméable'},
        {value:'dalles alvéolaires engazonnées', text:'dalles alvéolaires engazonnées'},
        {value:'beton desactivé / stabilisé', text:'béton désactivé / stabilisé'},
        {value:'Graviers compactés', text:'Graviers compactés'},
      ]
  };

  const coeffsRuiss = {
      toiture: {
          toiture_etanche: 0.95,
          toiture_vegetalisee_extensive: 0.5,
          toiture_vegetalisee_intensive: 0.3
      },
      espace_vert: {
          'Jardins,espaces verts': 0.35,
          'Pelouses entretenues': 0.32
      },
      circulation: {
          'beton,enrobés bitumineux,chaussées imperméables': 0.87,
          'Enrobé drainant / chaussée perméable': 0.7,
          'dalles alvéolaires engazonnées': 0.2,
          'beton desactivé / stabilisé': 0.6,
          'Graviers compactés': 0.4
      }
  };

  function createSurfaceRow(prefill = {}) {
      surfaceIndex++;
      const idx = surfaceIndex;

      const row = document.createElement('div');
      row.className = 'row g-2 mb-2 surface-row';
      row.dataset.idx = idx;

      row.innerHTML = `
          <div class="col-md-3">
              <select class="form-select nature" name="surface[${idx}][nature]">
                  <option value="">-- Choisir la nature --</option>
                  <option value="toiture" ${prefill.nature=='toiture'?'selected':''}>Toiture</option>
                  <option value="espace_vert" ${prefill.nature=='espace_vert'?'selected':''}>Espace végétalisé</option>
                  <option value="circulation" ${prefill.nature=='circulation'?'selected':''}>Circulation ouverte</option>
              </select>
          </div>
          <div class="col-md-4">
              <select class="form-select type-spec" name="surface[${idx}][type]">
                  <option value="">-- Choisir la nature d'abord --</option>
              </select>
          </div>
          <div class="col-md-2">
              <input type="number" step="0.01" class="form-control coef" name="surface[${idx}][coef]" placeholder="Coef" readonly value="${prefill.coef || ''}">
          </div>
          <div class="col-md-2">
              <input type="number" step="0.01" class="form-control" name="surface[${idx}][value]" placeholder="Surface (m²)" value="${prefill.value || ''}">
          </div>
          <div class="col-md-1 d-flex align-items-center">
              <button type="button" class="btn btn-sm btn-danger remove-surface">✕</button>
          </div>
      `;

      surfacesList.appendChild(row);

      const natureSelect = row.querySelector('.nature');
      const typeSelect = row.querySelector('.type-spec');
      const coefInput = row.querySelector('.coef');
      const removeBtn = row.querySelector('.remove-surface');

      function updateTypeSpec() {
          const nature = natureSelect.value;
          typeSelect.innerHTML = '<option value="">-- Choisir la nature d\'abord --</option>';
          if(optionsSpecifiques[nature]){
              optionsSpecifiques[nature].forEach(opt => {
                  const sel = prefill.type === opt.value ? 'selected' : '';
                  typeSelect.innerHTML += `<option value="${opt.value}" ${sel}>${opt.text}</option>`;
              });
          }
          coefInput.value = '';
      }

      natureSelect.addEventListener('change', updateTypeSpec);

      typeSelect.addEventListener('change', function(){
          const nature = natureSelect.value;
          const type = typeSelect.value;
          coefInput.value = (coeffsRuiss[nature] && coeffsRuiss[nature][type]) ? coeffsRuiss[nature][type] : '';
      });

      removeBtn.addEventListener('click', () => row.remove());

      if(prefill.nature) updateTypeSpec();
  }

  // **IMPORTANT : bouton correctement lié**
  if(addSurfaceBtn){
      addSurfaceBtn.addEventListener('click', function(){
          const prefill = {};
          const firstNatureSelect = document.getElementById('natureMain');
          if(firstNatureSelect && firstNatureSelect.value) prefill.nature = firstNatureSelect.value;
          createSurfaceRow(prefill);
      });
  }

  // Crée une ligne au chargement
  window.addEventListener('load', function(){
      createSurfaceRow({nature: natureMain.value || 'toiture'});
  });

});

  // --- Validation formulaire ---
  document.getElementById('projectForm').addEventListener('submit', function(e){
      let formValid = true;
      const requiredFields = this.querySelectorAll('input[required], select[required]');
      requiredFields.forEach(f => {
          if(f.value.trim() === '') {
              f.classList.add('is-invalid');
              formValid = false;
          } else f.classList.remove('is-invalid');
      });

      const surfaceRows = document.querySelectorAll('.surface-row');
      surfaceRows.forEach(row => {
          row.querySelectorAll('input, select').forEach(f=>{
              if(f.value.trim() === '') {
                  f.classList.add('is-invalid');
                  formValid = false;
              } else f.classList.remove('is-invalid');
          });
      });

      if(!formValid) {
          e.preventDefault();
          alert('Veuillez remplir tous les champs avant de générer le rapport.');
      }
  });

  window.removeSurface = removeSurface;

   const previewBtn = document.getElementById('previewBtn');
  const computeBtn = document.getElementById('computeBtn');
  const summary = document.getElementById('summary');
  const summaryContent = document.getElementById('summaryContent');

  function gatherFormData(){
    const data = {};
    data.project = {
      title: document.getElementById('projectTitle').value,
      ref: document.getElementById('projectRef').value,
      address: document.getElementById('projectAddress').value,
      zip: document.getElementById('projectZip').value,
      city: document.getElementById('projectCity').value
    };
    data.mo = {
      name: document.getElementById('moName').value,
      first: document.getElementById('moFirstName').value,
      address: document.getElementById('moAddress').value,
      zip: document.getElementById('moZip').value,
      city: document.getElementById('moCity').value,
      phone: document.getElementById('moPhone').value,
      num: document.getElementById('moNumber').value
    };
    data.me = {
      name: document.getElementById('meName').value,
      first: document.getElementById('meFirstName').value,
      address: document.getElementById('meAddress').value,
      zip: document.getElementById('meZip').value,
      city: document.getElementById('meCity').value,
      phone: document.getElementById('mePhone').value,
      num: document.getElementById('meNumber').value
    };
    data.tech = {
      siteSurface: parseFloat(document.getElementById('siteSurface').value) || 0,
      debitFuite: parseFloat(document.getElementById('debitFuite').value) || 0,
      region: document.getElementById('zoneInput').value,
      periode: document.getElementById('periode').value
    };

    // gather dynamic surfaces
    const surfaces = [];
    surfacesList.querySelectorAll('.surface-row').forEach(function(row){
      const idx = row.dataset.idx;
      const nature = row.querySelector(`select[name="surface[${idx}][nature]"]`).value;
      const value = parseFloat(row.querySelector(`input[name="surface[${idx}][value]"]`).value) || 0;
      const coef = parseFloat(row.querySelector(`input[name="surface[${idx}][coef]"]`).value) || 0;
      if(value > 0) surfaces.push({nature, value, coef});
    });
    data.tech.surfaces = surfaces;
    return data;
  }

  previewBtn.addEventListener('click', function(){
    const data = gatherFormData();
    let html = '';
    html += `<h2><strong>Projet :</strong></h2> ${data.project.title || '-'}<br>`;
    html += `<h3><strong>Adresse :</strong></h3> ${data.project.address || '-'} ${data.project.zip || ''} ${data.project.city || ''}<hr>`;
    html += `<h3><strong>Maître d'ouvrage :</strong></h3> ${data.mo.name || ''} ${data.mo.first || ''} — ${data.mo.phone || ''}<br>`;
    html += `<h3><strong>Maître d'œuvre :</strong></h3> ${data.me.name || ''} ${data.me.first || ''} — ${data.me.phone || ''}<hr>`;
    html += `<h3><strong>Données techniques :</strong></h3><br>`;
    html += `<strong>Surface terrain:</strong> ${data.tech.siteSurface} m²<br>`;
    html += `<strong>Débit fuite:</strong> ${data.tech.debitFuite} L/s<br>`;
    html += `<strong>Région:</strong> ${data.tech.region || '-'}<br>`;
    html += `<strong>Période:</strong> ${data.tech.periode} ans<br><br>`;


    if(data.tech.surfaces.length){
      html += `<strong>Surfaces détaillées:</strong><ul>`;
      data.tech.surfaces.forEach((s, i)=>{
        html += `<li>${i+1}. ${s.nature.replace('_',' ')} — ${s.value} m² — coef ${s.coef}</li>`;
      });
      html += `</ul>`;
    } else {
      html += `<em>Aucune surface renseignée.</em>`;
    }

    summaryContent.innerHTML = html;
    summary.classList.remove('d-none');
    summary.scrollIntoView({behavior:'smooth'});
  });






  const data = gatherFormData();

fetch('/enregistrer', {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify(data)
});

</script>
