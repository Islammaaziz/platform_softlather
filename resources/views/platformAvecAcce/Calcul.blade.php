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
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('platformtechnique')}}">
                            <i class="fa fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('calcul')}}">
                            <i class="fa fa-calculator"></i> Calculs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Rapport')}}">
                            <i class="fa fa-file-alt"></i> Rapports
                        </a>
                    </li>
            
                    <!-- Notifications -->
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
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Rapport énergétique généré</td>
                                            <td>13/10/2025</td>
                                            <td><span class="badge bg-success">Lu</span></td>
                                        </tr>
                                        <tr>
                                            <td>Nouvelle alerte sur CTA</td>
                                            <td>12/10/2025</td>
                                            <td><span class="badge bg-danger">Non lu</span></td>
                                        </tr>
                                        <tr>
                                            <td>Rapport supprimé</td>
                                            <td>11/10/2025</td>
                                            <td><span class="badge bg-success">Lu</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="dropdown-footer mt-2 text-center">
                                <a href="#" class="text-decoration-none">Voir toutes les notifications</a>
                            </div>
                        </ul>
                    </li>
                    
            
                    <!-- Profil -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fa fa-user"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <!-- Lien vers le profil -->
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fa fa-id-badge"></i> Mon profil
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
            </div>
            
        </div>
    </nav>

<div class="container pb-5">
  
  <div>
   <h2 class="section-title text-center">bienvenu sur la page de calcul</h2> 
</div>

  <form id="projectForm" class="mb-4">

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
            <input type="text" class="form-control" id="projectTitle" placeholder="Ex: Aménagement toits bâtiment A" required>
          </div>
          <div class="col-md-4">
            <label class="form-label"><strong>Référence interne</strong></label>
            <input type="text" class="form-control" id="projectRef" placeholder="Ref. projet (optionnel)">
          </div>

          <div class="col-md-4">
            <label class="form-label"><strong>Adresse</strong></label>
            <input type="text" class="form-control" id="projectAddress" placeholder="Rue, numéro">
          </div>
          <div class="col-md-3">
            <label class="form-label"><strong>Code postal</strong></label>
            <input type="text" class="form-control" id="projectZip" placeholder="Ex: 75012">
          </div>
          <div class="col-md-5">
            <label class="form-label"><strong>Ville</strong></label>
            <input type="text" class="form-control" id="projectCity" placeholder="Ex: Paris">
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>
</div>





<div class="container my-5">
    <div class="row justify-content-center">
            <div class="card shadow-lg border-0">
                <div class="card-header text-center p-4">
    <!-- 2) Maître d'ouvrage -->
    <div class="card mb-4">
      <div class="card-header p-3 d-flex justify-content-between align-items-center">
        <div><i class="fa fa-cogs me-2"></i><strong>2. Maître d'ouvrage</strong></div>
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label"><strong>Nom</strong></label>
            <input type="text" class="form-control" id="moName" placeholder="Nom">
          </div>
          <div class="col-md-6">
            <label class="form-label"><strong>Prénom</strong></label>
            <input type="text" class="form-control" id="moFirstName" placeholder="Prénom">
          </div>
          <div class="col-md-6">
            <label class="form-label"><strong>Adresse</strong></label>
            <input type="text" class="form-control" id="moAddress" placeholder="Adresse">
          </div>
          <div class="col-md-3">
            <label class="form-label"><strong>Code postal</strong></label>
            <input type="text" class="form-control" id="moZip" placeholder="CP">
          </div>
          <div class="col-md-3">
            <label class="form-label"><strong>Ville</strong></label>
            <input type="text" class="form-control" id="moCity" placeholder="Ville">
          </div>
          <div class="col-md-6">
            <label class="form-label"><strong>Téléphone</strong></label>
            <input type="tel" class="form-control" id="moPhone" placeholder="06 12 34 56 78">
          </div>
          <div class="col-md-6">
            <label class="form-label"><strong>Numéro (ID client / SIRET)</strong></label>
            <input type="text" class="form-control" id="moNumber" placeholder="Numéro">
          </div>
        </div>
      </div>
    </div>

</div>
</div>
</div>
</div>



<div class="container my-5">
    <div class="row justify-content-center">
            <div class="card shadow-lg border-0">
                <div class="card-header text-center p-4">
    <!-- 3) Maître d'oeuvre -->
    <div class="card mb-4">
      <div class="card-header p-3 d-flex justify-content-between align-items-center">
        <div><i class="fa fa-cogs me-2"></i><strong>3. Maître d'œuvre</strong></div>
       
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label"><strong>Nom</strong></label>
            <input type="text" class="form-control" id="meName" placeholder="Nom">
          </div>
          <div class="col-md-6">
            <label class="form-label"><strong>Prénom</strong></label>
            <input type="text" class="form-control" id="meFirstName" placeholder="Prénom">
          </div>
          <div class="col-md-6">
            <label class="form-label"><strong>Adresse</strong></label>
            <input type="text" class="form-control" id="meAddress" placeholder="Adresse">
          </div>
          <div class="col-md-3">
            <label class="form-label"><strong>Code postal</strong></label>
            <input type="text" class="form-control" id="meZip" placeholder="CP">
          </div>
          <div class="col-md-3">
            <label class="form-label"><strong>Ville</strong></label>
            <input type="text" class="form-control" id="meCity" placeholder="Ville">
          </div>
          <div class="col-md-6">
            <label class="form-label"><strong>Téléphone</strong></label>
            <input type="tel" class="form-control" id="mePhone" placeholder="06 12 34 56 78">
          </div>
          <div class="col-md-6">
            <label class="form-label"><strong>Numéro (SIRET)</strong></label>
            <input type="text" class="form-control" id="meNumber" placeholder="Numéro">
          </div>
        </div>
      </div>
    </div>

</div>
</div>
</div>
</div>




<div class="container my-5">
    <div class="row justify-content-center">
            <div class="card shadow-lg border-0">
                <div class="card-header text-center p-4">
    <!-- 4) Données techniques -->
    <div class="card mb-4">
      <div class="card-header p-3 d-flex justify-content-between align-items-center">
        <div><i class="fa fa-cogs me-2"></i><strong>4. Données techniques</strong></div>
        
      </div>
      <div class="card-body">
        <div class="row g-3 mb-3">
          <div class="col-md-4">
            <label class="form-label"><strong>Surface du terrain (m²)</strong></label>
            <input type="number" step="0.01" class="form-control" id="siteSurface" placeholder="Ex: 1200">
          </div>
          <div class="col-md-4">
            <label class="form-label"><strong>Débit de fuite (L/s)</strong></label>
            <input type="number" step="0.01" class="form-control" id="debitFuite" placeholder="Ex: 5">
          </div>
          <div class="text-center my-4">
            <h5><strong>Région hydrologique :</strong></h5>
          
            <!-- Image de la carte -->
            <div class="zone-france-container position-relative d-inline-block">
              <img src="{{ asset('images/cartefrance.webp') }}" 
                   alt="Carte des zones de France" 
                   class="carte-france"
                   id="carteFrance">
          
              <!-- Affichage du nom de la zone survolée -->
              <div id="tooltipZone" class="tooltip-zone">Survolez une zone</div>
            </div>
          
            <p class="mt-3">
              🗺️ <strong>Zone sélectionnée :</strong> 
              <span id="zoneSelectionnee" class="fw-bold text-primary">Aucune</span>
            </p>
          
            <input type="hidden" id="zoneInput" name="zone">
          </div>
          
          <style>
            /* --- STYLE DE LA CARTE --- */
            .carte-france {
              width: 300px;        /* 🔹 Taille réduite */
              border-radius: 10px;
              transition: transform 0.3s ease, box-shadow 0.3s ease;
              cursor: pointer;
            }
          
            .carte-france:hover {
              transform: scale(1.05);
              box-shadow: 0 0 15px rgba(0,0,0,0.3);
            }
          
            /* --- INFOS SURVOL --- */
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
            const carte = document.getElementById('carteFrance');
            const tooltip = document.getElementById('tooltipZone');
            const zoneText = document.getElementById('zoneSelectionnee');
            const zoneInput = document.getElementById('zoneInput');
          
            // Exemple de détection de zones selon position du clic (zones fictives)
            carte.addEventListener('mousemove', (e) => {
              const rect = carte.getBoundingClientRect();
              const x = e.clientX - rect.left;
              const y = e.clientY - rect.top;
          
              let zone = '';
          
              if (y < rect.height / 3) zone = 'Zone Nord';
              else if (y < 2 * rect.height / 3) zone = 'Zone Centre';
              else zone = 'Zone Sud';
          
              tooltip.textContent = zone;
              tooltip.classList.add('show');
            });
          
            carte.addEventListener('mouseleave', () => {
              tooltip.classList.remove('show');
            });
          
            carte.addEventListener('click', (e) => {
              const rect = carte.getBoundingClientRect();
              const y = e.clientY - rect.top;
          
              let zone = '';
              if (y < rect.height / 3) zone = 'Zone Nord';
              else if (y < 2 * rect.height / 3) zone = 'Zone Centre';
              else zone = 'Zone Sud';
          
              zoneText.textContent = zone;
              zoneInput.value = zone;
            });
          </script>
          
        <div class="row g-3 mb-3">
          <div class="col-md-4">
            <label class="form-label"><strong>Période (ans)</strong></label>
            <select id="periode" class="form-select">
              <option value="2">2 ans</option>
              <option value="4">4 ans</option>
              <option value="10">10 ans</option>
              <option value="20">20 ans</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label"><strong>Nature de surface</strong></label>
            <select id="natureMain" class="form-select">
              <option value="">-- Choisir --</option>
              <option value="toiture">Toiture</option>
              <option value="espace_vert">Espace végétalisé</option>
              <option value="circulation">Circulation ouverte</option>
            </select>
            <div class="small-muted mt-1">Si plusieurs types, ajoute d'autres lignes ci-dessous.</div>
          </div>

          <div class="col-md-4 d-flex align-items-end">
            <button type="button" class="btn btn-outline-primary w-100" id="addSurfaceBtn"><i class="fa fa-plus me-2"></i>Ajouter une surface</button>
          </div>
        </div>

        <!-- surfaces dynamiques -->
        <div id="surfacesList" class="mb-3">
          <!-- template row will be injected here -->
        </div>

        <div class="d-flex gap-2">
          <button type="button" class="btn btn-success" id="previewBtn"><i class="fa fa-eye me-2"></i>Voir résumé</button>
          <button type="reset" class="btn btn-secondary" id="resetBtn">Réinitialiser</button>
          <button type="button" class="btn btn-primary ms-auto" id="computeBtn"><i class="fa fa-calculator me-2"></i>Generer rapport</button>
        </div>

        <!-- Résumé -->
        <div id="summary" class="mt-3 d-none">
          <div class="summary-box">
            <h6 class="mb-2">Résumé des données</h6>
            <div id="summaryContent" style="font-size:0.95rem;"></div>
          </div>
        </div>

      </div>
    </div>

</div>
</div>
</div>
</div>

  </form>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // --- Gestion des surfaces dynamiques ---
  let surfaceIndex = 0;
  const surfacesList = document.getElementById('surfacesList');
  const addSurfaceBtn = document.getElementById('addSurfaceBtn');
  const natureMain = document.getElementById('natureMain');

  function createSurfaceRow(prefill = {}) {
    surfaceIndex++;
    const idx = surfaceIndex;
    const row = document.createElement('div');
    row.className = 'd-flex surface-row mb-2';
    row.dataset.idx = idx;

    row.innerHTML = `
      <div class="col p-0 me-2">
        <select class="form-select" name="surface[${idx}][nature]" aria-label="Nature">
          <option value="toiture" ${prefill.nature=='toiture' ? 'selected' : ''}>Toiture</option>
          <option value="espace_vert" ${prefill.nature=='espace_vert' ? 'selected' : ''}>Espace végétalisé</option>
          <option value="circulation" ${prefill.nature=='circulation' ? 'selected' : ''}>Circulation ouverte</option>
          <option value="autre" ${prefill.nature=='autre' ? 'selected' : ''}>Autre</option>
        </select>
      </div>
      <div class="col p-0 me-2">
        <input type="number" step="0.01" name="surface[${idx}][value]" class="form-control" placeholder="Surface (m²)" value="${prefill.value || ''}" />
      </div>
      <div class="col p-0 me-2">
        <input type="number" step="0.01" name="surface[${idx}][coef]" class="form-control" placeholder="Coefficient C (ex: 0.9)" value="${prefill.coef || ''}" />
      </div>
      <div class="d-flex align-items-center">
        <button type="button" class="btn btn-sm btn-danger me-2" onclick="removeSurface(${idx})" title="Supprimer"><i class="fa fa-trash"></i></button>
      </div>
    `;

    // wrap inside a bootstrap grid row for alignment
    const wrapper = document.createElement('div');
    wrapper.className = 'row gx-2';
    const col = document.createElement('div');
    col.className = 'col-12';
    col.appendChild(row);
    surfacesList.appendChild(col);
  }

  function removeSurface(idx){
    const node = surfacesList.querySelector('[data-idx="'+idx+'"]');
    if(node) node.parentElement.remove();
  }

  addSurfaceBtn.addEventListener('click', function(){
    // If a main nature is selected, prefill it
    const pre = {};
    if(natureMain.value) pre.nature = natureMain.value;
    createSurfaceRow(pre);
  });

  // Keep at least one surface by default
  window.addEventListener('load', function(){
    createSurfaceRow({nature: natureMain.value || 'toiture'});
  });

  // --- Résumé & calcul simple ---
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

  // compute quick example: compute total effective volume (simple sum using V = surface*coef*pluie (we don't have pluie here) )
  computeBtn.addEventListener('click', function(){
    const data = gatherFormData();
    // we need a rainfall input to compute real volume; for demo we'll ask the user
    const pluie = parseFloat(prompt("Entrer la pluviométrie de conception (mm) pour le calcul rapide :", "800"));
    if(isNaN(pluie) || pluie <= 0) return alert('Pluviométrie invalide.');
    const pluie_m = pluie / 1000;
    let total = 0;
    data.tech.surfaces.forEach(s=>{
      const coef = s.coef || 0.9;
      total += s.value * coef * pluie_m;
    });
    alert(`Volume total estimé (somme surfaces) : ${total.toFixed(2)} m³`);
  });

  // reset behaviour: hide summary and clear surfaces
  document.getElementById('resetBtn').addEventListener('click', function(){
    surfacesList.innerHTML = '';
    surfaceIndex = 0;
    createSurfaceRow({nature: natureMain.value || 'toiture'});
    summary.classList.add('d-none');
  });

  // helper to expose createSurfaceRow to reset handler
  function createSurfaceRow(prefill) {
    // same implementation as earlier but redeclared to avoid hoisting issues
    surfaceIndex++;
    const idx = surfaceIndex;
    const wrapper = document.createElement('div');
    wrapper.className = 'row gx-2';
    wrapper.innerHTML = `
      <div class="col-12">
        <div class="d-flex surface-row mb-2" data-idx="${idx}">
          <div class="col p-0 me-2">
            <select class="form-select" name="surface[${idx}][nature]">
              <option value="toiture" ${prefill.nature=='toiture' ? 'selected' : ''}>Toiture</option>
              <option value="espace_vert" ${prefill.nature=='espace_vert' ? 'selected' : ''}>Espace végétalisé</option>
              <option value="circulation" ${prefill.nature=='circulation' ? 'selected' : ''}>Circulation ouverte</option>
              <option value="autre" ${prefill.nature=='autre' ? 'selected' : ''}>Autre</option>
            </select>
          </div>
          <div class="col p-0 me-2">
            <input type="number" step="0.01" name="surface[${idx}][value]" class="form-control" placeholder="Surface (m²)" value="${prefill.value || ''}" />
          </div>
          <div class="col p-0 me-2">
            <input type="number" step="0.01" name="surface[${idx}][coef]" class="form-control" placeholder="Coef C (ex:0.9)" value="${prefill.coef || ''}" />
          </div>
          <div class="d-flex align-items-center">
            <button type="button" class="btn btn-sm btn-danger me-2" onclick="removeSurface(${idx})"><i class="fa fa-trash"></i></button>
          </div>
        </div>
      </div>
    `;
    surfacesList.appendChild(wrapper);
  }

  // expose removeSurface to global scope
  window.removeSurface = function(idx){
    const el = surfacesList.querySelector('[data-idx="'+idx+'"]');
    if(el) el.parentElement.remove();
  };

  // ensure initial row
  surfacesList.innerHTML = '';
  createSurfaceRow({nature: natureMain.value || 'toiture'});

</script>




</body>
</html>
