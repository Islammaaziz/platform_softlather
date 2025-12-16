<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SoftLather </title>
  <link rel="icon" href="{{ asset('images/softlather.jpg') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">





    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- CSS Personnalisé -->
    <style>
        
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .card {
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .section-title {
            margin-top: 40px;
            margin-bottom: 20px;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            margin-top: 40px;
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





    footer {
      background: #1a1a1a;
      color: white;
      text-align: center;
      padding: 30px 20px;
      
    }

    footer nav a {
      color: white;
      margin: 0 10px;
      font-size: 1rem;
      transition: color 0.3s ease;
    }

    footer nav a:hover {
      color: #2e4ecc;
    }

    footer p {
      margin-top: 15px;
      font-size: 0.9rem;
    }
    nav {
    display: flex;
    gap: 20px;
    align-items: center;
}
body { background-color: #f8f9fa; }
    .navbar-brand { font-weight: bold; }
    .logo-container { display: flex; align-items: center; gap: 12px; }
    .logo-container img { width: 50px; height: 50px; border-radius: 8px; }
    .logo-container h1 { font-size: 1.9rem; margin: 0; font-weight: bold; color: #e0dfdf; }
    .card { transition: transform 0.2s ease; }
    .card:hover { transform: scale(1.02); }
    .card-header { background: linear-gradient(90deg, #4e73df 0%, #224abe 100%); color: white; }
    .avatar { width: 140px; height: 140px; border-radius: 50%; border: 3px solid #4e73df; object-fit: cover; }
    .list-group-item { font-size: 1rem; display: flex; justify-content: space-between; align-items: center; }
    .list-group-item i { min-width: 25px; color: #4e73df; margin-right: 8px; }
    footer { background: #1a1a1a; color: white; text-align: center; padding: 30px 20px; }
    footer nav a { color: white; margin: 0 10px; font-size: 1rem; transition: color 0.3s ease; }
    footer nav a:hover { color: #2e4ecc; }
    footer p { margin-top: 15px; font-size: 0.9rem; }
    strong {
    color: #000000;           /* noir */
    font-weight: bold;         /* gras */
    font-family: 'Arial', sans-serif;  /* police lisible type titre */
    font-size: 1.1rem;        /* légèrement plus grand */
    
}

    
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="logo-container">
                <img src="{{ asset('images/softlather.jpg') }}" alt="Logo Softlather">
                <a href="{{route('platformtechnique')}}" style="text-decoration:none; color:inherit;"> 
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

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-center p-4">
                        <h3 class="mb-0">Profil Utilisateur</h3>
                    </div>
                    <div class="card-body">
                        <!-- Avatar -->
                        
    
                        <!-- Infos utilisateur (aligné à gauche) -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fa fa-user"><strong> Nom:</strong></i> {{ $user->name }}</li>
                            <li class="list-group-item"><i class="fa fa-id-badge"><strong> Prénom:</strong></i> {{ $user->prenom ?? '-' }}</li>
                            <li class="list-group-item"><i class="fa fa-envelope"><strong> Email:</strong></i> {{ $user->email }}</li>
                            <li class="list-group-item"><i class="fa fa-phone"><strong> Numéro:</strong></i> {{ $user->telephone ?? '-' }}</li>
                            <li class="list-group-item"><i class="fa fa-clock"><strong> Adresse:</strong></i>   {{ $user->adresse   ?? '-' }}</li>
                            <li class="list-group-item"><i class="fa fa-clock"><strong> Ville:</strong></i>   {{ $user->ville ?? '-' }}</li>
                            <li class="list-group-item"><i class="fa fa-clock"><strong> Code postal:</strong></i>   {{ $user->code_postal ?? '-' }}</li>
                            <li class="list-group-item"><i class="fa fa-lock"><strong> Mot de passe:</strong></i> ********</li>
                            <li class="list-group-item"><i class="fa fa-toggle-on"><strong> Statut:</strong></i> {{ $user->statut }}</li>
                            <li class="list-group-item"><i class="fa fa-calendar-alt"><strong> Création:</strong></i> {{ $user->created_at->format('d/m/Y') }}</li>
                            <li class="list-group-item"><i class="fa fa-clock"><strong> Dernière connexion:</strong></i>   {{ now()->format('d/m/Y ') }}</li>

                            
                            
                        </ul>
    
                        <!-- Bouton modifier -->
                        <div class="text-center mt-4">
                           <a href="{{route('modifierprofil')}}"> <button class="btn btn-primary btn-lg px-4"><i class="fa fa-edit me-2"></i> Modifier le profil</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer>

    
        <div class="contact-info">
            <h4>Obtenez un devis gratuit</h4>
            <h5>
                <i class="fas fa-map-marker-alt"></i>
                <a href="https://www.google.com/maps?q=21+AV.+Jean+Moulin+Montreuil+93100" target="_blank" style="text-decoration:none; color:inherit;">
                    21 AV. Jean Moulin Montreuil 93100
                </a>
            </h5>
             <p>Contactez-nous pour discuter de votre projet informatique et GTB.</p>
             <h5><i class="fas fa-phone"></i>
            Téléphone : <a href="tel:+338181840130" style="text-decoration:none; color:inherit;">01 81 84 01 30</a></h5>
            
            <h5><i class="fas fa-envelope"></i> contact@softlather.com</h4>
            <h5>
                <i class="fab fa-linkedin"></i>
                <a href="https://www.linkedin.com/in/islam-maaziz" target="_blank" style="text-decoration:none; color:inherit;">
                    LinkedIn
                </a>
            </h5>
        </div>
    
    <p>&copy; <span id="year"></span> SoftLather. Tous droits réservés.</p>
    
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
