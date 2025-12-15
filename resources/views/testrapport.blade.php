<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapport Projet</title>

    <style>
        body { 
            font-family: 'Arial', sans-serif; 
            font-size: 12px; 
            color: #333; 
            margin: 20px; 
            line-height: 1.5;
        }

        /* Logo centré */
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            width: 120px;
            height: auto;
        }

        /* Titres encadrés */
        .title-box {
            border: 2px solid #2980b9;
            border-radius: 6px;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            margin: 15px auto;
            width: 80%;
        }

        .highlight-title {
            background-color: #ffeb3b;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: bold;
            display: inline-block;
        }

        /* Bloc info principal */
        .info-box {
            background-color: #f0f8ff;
            border-radius: 6px;
            padding: 15px;
            margin: 15px auto;
            width: 85%;
            box-shadow: 1px 1px 6px rgba(0,0,0,0.1);
        }

        .info-section { margin-bottom: 20px; }
        .info-line {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 4px;
            margin-bottom: 6px;
        }
        .info-title { font-size: 14px; font-weight: bold; color: #2980b9; }
        .info-data { font-size: 13px; font-weight: bold; text-align: right; }
        .info-details { text-align: right; margin-top: -4px; line-height: 1.4; font-size: 12px; }

        /* Titres et sections */
        h1 { font-size: 25px; margin-top: 15px; margin-bottom: 10px; }
        h2 { font-size: 22px; margin-top: 15px; margin-bottom: 10px; color: #2980b9; }
        h3 { font-size: 18px; margin-top: 15px; margin-bottom: 8px; }
        h4 { font-size: 16px; margin-top: 12px; margin-bottom: 6px; }

        /* Tableaux */
        table { 
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            width: 80%;
            margin: 10px auto;
            font-size: 12px;
        }
        th {
            background-color: #2980b9;
            color: white;
            font-weight: bold;
            padding: 6px;
        }
        td { padding: 6px; }
        tr:nth-child(even) td { background-color: #f9f9f9; }
        tr:hover td { background-color: #e0f7fa; }

        /* Pagination */
        .page-break { page-break-before: always; }

        /* Images centrées avec légende */
        .image-container {
            text-align: center;
            margin: 20px 0;
        }
        .image-container img {
            max-width: 60%;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-shadow: 1px 1px 6px rgba(0,0,0,0.2);
        }
        .image-caption {
            text-align: center;
            font-size: 12px;
            color: #555;
            margin-top: 5px;
        }

        .titre-principal {
    color: #000 !important;
}

    </style>
</head>

<body>

<!-- PAGE 1 -->
<div class="logo-container">
    <img src="{{ public_path('images/softlather.jpg') }}" alt="Logo">
</div>

<div class="title-box">
    <h2 class="titre-principal">NOTE DE CALCUL DE DIMENSIONNEMENT D UN BASSIN DE RETENTION DES EAUX PLUVIALES</h2>
</div>

<div class="title-box">
    <h4><span class="highlight-title">Intitulé du projet :</span></h4>
    <h1>{{ $projet->nom_projet }}</h1>
</div>

<div class="info-box">
    <!-- Maître d'ouvrage -->
    <div class="info-section">
        <div class="info-line">
            <div class="info-title">Maître d'ouvrage</div>
            <div class="info-data">{{ $projet->maitreOuvrage->prenom }}</div>
        </div>
        <div class="info-details">
            {{ $projet->maitreOuvrage->nom }}<br>
            {{ $projet->maitreOuvrage->adresse }}<br>
            {{ $projet->maitreOuvrage->cp }} {{ $projet->maitreOuvrage->ville }}<br>
            Tél : {{ $projet->maitreOuvrage->telephone }}<br>
            Numéro : {{ $projet->maitreOuvrage->numero }}
        </div>
    </div>

    <!-- Maître d'œuvre -->
    <div class="info-section">
        <div class="info-line">
            <div class="info-title">Maître d'œuvre</div>
            <div class="info-data">{{ $projet->maitreOeuvre->prenom }}</div>
        </div>
        <div class="info-details">
            {{ $projet->maitreOeuvre->nom }}<br>
            {{ $projet->maitreOeuvre->adresse }}<br>
            {{ $projet->maitreOeuvre->cp }} {{ $projet->maitreOeuvre->ville }}<br>
            Tél : {{ $projet->maitreOeuvre->telephone }}<br>
            Numéro : {{ $projet->maitreOeuvre->numero }}
        </div>
    </div>

    <!-- BET -->
    <div class="info-section">
        <div class="info-line">
            <div class="info-title">Bureau d’études thermique & fluides</div>
            <div class="info-data">Softlather</div>
        </div>
        <div class="info-details">
            Softlather Engineering<br>
            21 avenue Jean Moulin<br>
            93100 Montreuil<br>
            Tél : 07 67 55 58 17<br>
            Email : bet@lather.fr
        </div>
    </div>
</div>
<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <tr>
   <th style="border: 1px solid #000; padding: 6px; background: #d6c4c4ff; color: #000;">
    Indice
</th>
<th style="border: 1px solid #000; padding: 6px; background: #f2f2f2; color: #000;">
    Date
</th>
<th style="border: 1px solid #000; padding: 6px; background: #f2f2f2; color: #000;">
    Observation
</th>

    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 6px;">A</td>
        <td style="border: 1px solid #000; padding: 6px;">{{ now()->format('d/m/Y') }}</td>
        <td style="border: 1px solid #000; padding: 6px;">Première diffusion</td>
    </tr>
</table>


<div class="page-break"></div>

<!-- PAGE 2 -->
 <div class="title-box">
        <h3>
            <span class="highlight-title">
                CALCUL DU VOLUME DE LA CUVE DE RETENTION DES EAUX PLUVIALES
            </span>
        </h3>
    </div>

    <p>Le dimensionnement des ouvrages retenus est effectué par la méthode des volumes. Cette méthode est celle conseillée par l’instruction technique de 1977.</p>

    <div style="text-align: left;">
        <b><u>Determination de la surface active Sa :</u></b>
        <p>La surface active (Sa) est la surface participant au ruissellement.<br>
        La surface active d'une parcelle dépend de la taille de la parcelle et de son coefficient de ruissellement.<br>
        Le coefficient de ruissellement varie selon le type de la surface raccordée et est donné dans le tableau ci-dessous.</p>

        <p><b><u>Tableau des surfaces :</u></b></p>
        <table>
            <thead>
                <tr>
                    <th>Nature de surface</th>
                    <th>Surface (m²)</th>
                    <th>Type de surface (s)</th>
                    <th>Coefficient de ruissellement (c)</th>
                    <th>Sa (m²)</th>
                </tr>
            </thead>


            
    <tbody>
             @if(isset($projet->donneesTechnique->surfaces) && $projet->donneesTechnique->surfaces->count() > 0)
            @foreach ($projet->donneesTechnique->surfaces as $s)
                <tr>
                    <td>(sous surface) {{ $s->type }}</td>
                    <td>{{ $s->surface }}</td>
                    <td>{{ $s->typeSpecifique }}</td>
                    <td>{{ $s->coef_c }}</td>
                    <td>{{ $s->surface_active }}</td>
                </tr>
            @endforeach
        @endif

    </tbody>
        </table>



        <p><b><u>Tableau des surfaces :</u></b></p>

          <table>
            <tbody>
                <tr><td style="font-weight: bold;">S (m²)</td><td>{{ $projet->donneesTechnique->sitesurface }}</td></tr>
                <tr><td style="font-weight: bold;">Sa (m²)</td><td>{{  $projet->donneesTechnique->surface_active }}</td></tr>
                <tr><td style="font-weight: bold;">S (ha)</td><td>{{ $projet->donneesTechnique->sitesurface / 10000 }}</td></tr>
                <tr><td style="font-weight: bold;">Sa (ha)</td><td>{{  $projet->donneesTechnique->surface_active / 10000 }}</td></tr>
                <tr><td style="font-weight: bold;">Coefficient de ruissellement</td><td>{{$projet->donneesTechnique->coefRuiss }}</td></tr>
            </tbody>
        </table>

        <p><b><u>Le débit de fuite admissible à l’aval Q :</u></b></p>
        <table>
            <tbody>
                <tr><td style="font-weight: bold;">Q (L/s)</td><td>{{ $projet->donneesTechnique->debit_fuite }}</td></tr>
                <tr><td style="font-weight: bold;">Q (L/s/ha)</td><td>{{ number_format($projet->donneesTechnique->debit_fuite * ($projet->donneesTechnique->sitesurface / 10000), 2) }}</td></tr>
                <tr><td style="font-weight: bold;">Q (m³/s)</td><td>{{ $projet->donneesTechnique->debit_fuite * ($projet->donneesTechnique->sitesurface / 10000)* 0.001 }}
</td></tr>
            </tbody>
        <p><b><u>Calcul de la hauteur équivalente: q = 360*Q/Sa</u></b></p>
        <table>
            <tbody>
                <tr><td style="font-weight: bold;">Hauteur équivalente (mm/h)</td><td>{{ number_format($projet->donneesTechnique->Hauteur_equivalente, 2, '.', ',') }}
</td></tr>
            </tbody>
        </table>

        <p><b><u>Hauteur spécifique de stockage :</u></b> La valeur de la hauteur spécifique de stockage ha (mm) pour une pluie de retour 20 ans.</p>
        <table>
            <tbody>
                 <tr><td style="color: red; font-weight: bold;">Zone</td><td>{{$projet->donneesTechnique->zoneInput}}</td></tr>
                <tr><td style="color: red; font-weight: bold;">Periode</td><td>{{$projet->donneesTechnique->periodeAns}}</td></tr>
                <tr><td style="color: red; font-weight: bold;">Hauteur spécifique (mm)</td><td style="color: red; font-weight: bold;">{{ number_format($projet->donneesTechnique->Hauteur_specifique_stockage, 2, '.', ',') }}</td></tr>
            </tbody>  
        </table>

        <p><b><u>Volume du bassin de rétention :</u></b></p>
        <table>
            <tbody>
                <tr><td style="font-weight: bold;">Volume (m³)</td><td>{{ $projet->donneesTechnique->volume }}</td></tr>
            </tbody>
        </table>

        <p><b><u>Conclusion :</u></b></p>
        <p>Pour ce projet, le volume retenu de la cuve de rétention des eaux pluviales est de <b>{{ $projet->donneesTechnique->volume  }} m³</b>.</p>
    </div>


<!-- Autres tableaux et calculs ici -->

<div class="page-break"></div>

<!-- PAGE 3: Données techniques -->
<h2>Bilan des données techniques</h2>
<p>
    Zone : {{ $projet->donneesTechnique->zoneInput }}<br>
    Type principal : {{ $projet->donneesTechnique->natureMain }}<br>
    Type specifique : {{ $projet->donneesTechnique->typeSpecifique}}<br>
    Période : {{ $projet->donneesTechnique->periodeAns }} ans<br>
    Surface terrain : {{ $projet->donneesTechnique->sitesurface }} m²<br>
    Surface active : {{ $projet->donneesTechnique->surface_active}}<br>
    Débit fuite : {{ $projet->donneesTechnique->debit_fuite }} L/s<br>
    coefficient de ruisellement : {{ $projet->donneesTechnique->coefRuiss}}<br>
    Hauteur equivalente : {{ $projet->donneesTechnique->Hauteur_equivalente}}  <br>
    Hauteur specifique stockage :  {{ $projet->donneesTechnique->Hauteur_specifique_stockage}}  <br>
        
</p>

<h2>Surfaces détaillées</h2>
<table>
    <thead>
        <tr>
            <th>Nature</th>
            <th>Surface (m²)</th>
            <th>Coefficient C</th>
            <th>Type</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projet->donneesTechnique->surfaces as $surface)
        <tr>
            <td>{{ $surface->type }}</td>
            <td>{{ $surface->typeSpecifique }}</td>
            <td>{{ $surface->surface }}</td>
            <td>{{ $surface->coef_c }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


<div class="page-break"></div>

<!-- PAGE 5: Cartes -->
<h2>Localisation et abaque</h2>

<h5>abaque</h5>
<div class="image-container">
    <img src="{{ public_path('images/coordone.jpg') }}" alt="Abaque">
    <div class="image-caption">Abaque</div>
</div>


<h5>Zone pluviométrique</h5>
<div class="image-container">
    <img src="{{ public_path('images/carte.jpg') }}" alt="Zone pluviométrique">
    <div class="image-caption">Zone pluviométrique</div>
</div>

</body>
</html>
