<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modifier le profil - SoftLather</title>
  <link rel="icon" href="{{ asset('images/softlather.jpg') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
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
  </style>
</head>
<body>

  <!-- NAVBAR -->
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
                                <i class="fa fa-id-badge"></i> Modifier profil
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

  <!-- FORMULAIRE DE MODIFICATION -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-lg border-0">
          <div class="card-header">
            <h3><i class="fa fa-edit me-2"></i> Modifier le Profil</h3>
          </div>
          <div class="card-body">

            <!-- Avatar -->
            <div class="text-center mb-4">
              <img src="{{ asset('images/iso.jpg') }}" alt="Avatar" class="avatar-preview" id="avatarPreview">
              <div>
                <label for="avatarUpload" class="btn btn-outline-primary btn-sm mt-2">
                  <i class="fa fa-camera"></i> Changer la photo
                </label>
                <input type="file" id="avatarUpload" class="d-none" accept="image/*" onchange="previewImage(event)">
              </div>
            </div>

            <!-- Formulaire -->
            <form action="{{ route('profil.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label"><strong>Nom :</strong></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Prénom :</strong></label>
                    <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $user->prenom) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Email :</strong></label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Numéro :</strong></label>
                    <input type="text" name="telephone" class="form-control" value="{{ old('telephone', $user->telephone) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Mot de passe :</strong></label>
                    <input type="password" name="password" class="form-control" placeholder="********">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg px-4">
                        <i class="fa fa-save me-2"></i> Enregistrer
                    </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer>
    <div class="contact-info mb-3">
      <h4>Obtenez un devis gratuit</h4>
      <h5><i class="fas fa-map-marker-alt"></i> 21 AV. Jean Moulin Montreuil 93100</h5>
      <p>Contactez-nous pour discuter de votre projet informatique et GTB.</p>
      <h5><i class="fas fa-phone"></i> Téléphone : 01 81 84 01 30</h5>
      <h5><i class="fas fa-envelope"></i> contact@softlather.com</h5>
      <h5><i class="fab fa-linkedin"></i> <a href="https://www.linkedin.com/in/islam-maaziz" target="_blank">LinkedIn</a></h5>
    </div>
    <p>&copy; <span id="year"></span> SoftLather. Tous droits réservés.</p>
  </footer>

  <script>
    // Affiche la photo sélectionnée
    function previewImage(event) {
      const reader = new FileReader();
      reader.onload = function(){
        document.getElementById('avatarPreview').src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }

    // Met l'année dynamique
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
