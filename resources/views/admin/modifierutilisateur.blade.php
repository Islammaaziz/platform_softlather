<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier utilisateur - SoftLather</title>
  <link rel="icon" href="images/softlather.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body { font-family: 'Segoe UI', sans-serif; background: #f8f9fa; }
    .sidebar {
      position: fixed;
      left: 0;
      top: 0;
      width: 220px;
      height: 100%;
      background: #1a1a1a;
      color: #fff;
      padding-top: 20px;
      display: flex;
      flex-direction: column;
    }
    .sidebar a {
      color: #fff;
      text-decoration: none;
      padding: 12px 20px;
      display: block;
      transition: background 0.2s;
      border-radius: 6px;
      margin: 5px 10px;
    }
    .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,0.2); }
    .sidebar .logo-container { display: flex; align-items: center; padding: 0 20px 20px 20px; }
    .sidebar .logo-container img { width: 40px; height: 40px; border-radius: 8px; margin-right: 10px; }
    .sidebar h3 { font-size: 1.2rem; margin: 0; }
    .content { margin-left: 240px; padding: 30px; }
    .section-card { background: #fff; border-radius: 12px; padding: 25px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); }
    h2.section-title { color: #1a1a1a; margin-bottom: 25px; font-weight: 700; }
    label { font-weight: 600; color: #333; }
    input, select, textarea { border-radius: 6px !important; border: 1px solid #ccc !important; }
    .btn-save { background: #4e73df; color: #fff; border: none; padding: 10px 20px; border-radius: 6px; }
    .btn-save:hover { background: #3c5ec7; }
    .btn-delete { background: #e55353; color: #fff; border: none; padding: 10px 20px; border-radius: 6px; }
    .btn-status {
      background: #28a745;
      color: #fff;
      border: none;
      border-radius: 20px;
      padding: 6px 15px;
      font-size: 0.9rem;
      font-weight: 600;
      display: inline-block;
    }
    footer { background: #222; color: #ccc; text-align: center; padding: 30px 20px; margin-top: 50px; }
    footer a { color: #ccc; text-decoration: none; }
    footer a:hover { color: #4e73df; }
    @media(max-width:768px){
      .sidebar{width: 100%; height: auto; position: relative;}
      .content{margin-left:0;}
    }
  </style>
</head>
<body>

  <div class="sidebar h-screen flex flex-col bg-[#1a334c] text-white">

    <!-- Logo -->
    <div class="logo-container flex flex-col items-center py-6 border-b border-gray-700">
        <img src="{{ asset('images/softlather.jpg') }}" alt="Logo" class="w-20 h-20 rounded-full mb-2">
        <h3 class="text-xl font-bold">SoftLather</h3>
    </div>

    <!-- Navigation Links -->
    <div class="flex-1 mt-4 flex flex-col">
        <a href="{{ route('dashboardadmin') }}" class="px-6 py-3 hover:bg-[#16253d] transition-colors flex items-center">
            <i class="fa fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="{{ route('voirutilisateurs') }}" class="px-6 py-3 hover:bg-[#16253d] transition-colors flex items-center">
            <i class="fa fa-user me-2"></i> Utilisateurs
        </a>
        <a href="{{ route('voirRapports') }}" class="px-6 py-3 hover:bg-[#16253d] transition-colors flex items-center">
            <i class="fa fa-file-alt me-2"></i> Rapports
        </a>
            <a href="{{ route('voirmessage')}}" class="px-6 py-3 hover:bg-[#16253d] transition-colors flex items-center">
             <i class="fa fa-inbox me-2"></i> Boîte de réception
        </a>
    </div>

    <!-- Logout en bas -->
    <div class="px-6 py-4 border-t border-gray-700 mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 rounded-md transition-colors">
                <i class="fa fa-sign-out-alt me-2"></i> Déconnexion
            </button>
        </form>
    </div>

</div>


<!-- Contenu principal -->
<div class="content">
  <h2 class="section-title">✏️ Modifier l’utilisateur</h2>

  <div class="section-card">
   <form id="userForm" method="POST" action="{{ route('updateutilisateur', ['id' => $utilisateur->id]) }}">
    @csrf
    @method('PUT') <!-- Pour Laravel PUT -->



    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" value="{{ $utilisateur->name }}">
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $utilisateur->email }}">
        </div>
    </div>

    <div class="mb-4">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" name="prenom" value="{{ $utilisateur->prenom }}">
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control" name="ville" value="{{ $utilisateur->ville }}">
        </div>
        <div class="col-md-6">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" name="telephone" value="{{ $utilisateur->telephone }}">
        </div>
    </div>

    <div class="mb-3">
        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" class="form-control" name="adresse" value="{{ $utilisateur->adresse }}">
    </div>
     
     <div class="mb-3">
        <label for="adresse" class="form-label">code postale</label>
        <input type="text" class="form-control" name="code_postal" value="{{ $utilisateur->code_postal }}">
    </div>

     <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="password" placeholder="Laisser vide pour ne pas changer">
    </div>

    <div class="d-flex justify-content-end mt-4">
        <button type="submit" class="btn-save me-2">
            <i class="fa fa-edit me-1"></i> Modifier
        </button>

        <button type="button" class="btn-delete" onclick="supprimerUtilisateur({{ $utilisateur->id }})">
            <i class="fa fa-trash me-1"></i> Supprimer
        </button>
    </div>
</form>

  </div>

  <div class="mt-4">
    <a href="{{route('voirutilisateurs')}}" class="btn btn-secondary">
      <i class="fa fa-arrow-left me-1"></i> Retour à la liste
    </a>
  </div>
</div>

<!-- Footer -->
<footer>
  © 2025 SoftLather - Tous droits réservés | <a href="#">Mentions légales</a>
</footer>

<script>
  function modifierUtilisateur() {
    alert("Les modifications ont été enregistrées (simulé côté front-end).");
  }

  function supprimerUtilisateur() {
    const confirmation = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
    if (confirmation) {
      alert("Utilisateur supprimé (simulé côté front-end).");
    }
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



<script>
function supprimerUtilisateur(id) {
    if (!confirm("Voulez-vous vraiment supprimer cet utilisateur ?")) {
        return;
    }

    // Création d'un form DELETE invisible
    let form = document.createElement('form');
    form.action = '/admin/utilisateur/' + id;
    form.method = 'POST';

    let token = document.createElement('input');
    token.type = 'hidden';
    token.name = '_token';
    token.value = '{{ csrf_token() }}';

    let method = document.createElement('input');
    method.type = 'hidden';
    method.name = '_method';
    method.value = 'DELETE';

    form.appendChild(token);
    form.appendChild(method);
    document.body.appendChild(form);

    form.submit();
}
</script>
</body>
</html>
