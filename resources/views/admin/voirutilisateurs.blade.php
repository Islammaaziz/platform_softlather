<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Utilisateurs - SoftLather</title>
  <link rel="icon" href="{{ asset('images/softlather.jpg') }}">
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
    .section-card { background: #fff; border-radius: 12px; padding: 20px; margin-bottom: 30px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); }
    h2.section-title { color: #1a1a1a; margin-bottom: 20px; font-weight: 700; }
    table { width: 100%; border-collapse: collapse; margin-top: 15px; }
    table th, table td { padding: 10px; border-bottom: 1px solid #e0e0e0; text-align: left; }
    table th { background: #f0f4ff; color: #1a1a1a; }
    .btn-action { border: none; border-radius: 6px; padding: 5px 8px; margin-right: 4px; cursor: pointer; }
    .btn-edit { background: #4e73df; color: #fff; }
    .btn-delete { background: #e55353; color: #fff; }
    .btn-view { background: #17a2b8; color: #fff; }
    .search-bar { margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; }
    .search-bar input { width: 250px; border-radius: 6px; border: 1px solid #ccc; padding: 6px 10px; }
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


<div class="content">
  <h2 class="section-title">👥 Liste des utilisateurs</h2>

  <div class="section-card">
    <div class="search-bar">
      <input type="text" placeholder="🔍 Rechercher un utilisateur...">
      <button class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter un utilisateur</button>
    </div>

    <div class="p-6 sm:p-10 bg-white shadow sm:rounded-lg max-w-6xl mx-auto">
      <h2 class="text-xl font-bold mb-4">Liste des utilisateurs</h2>
      <table class="table-auto w-full border-collapse border border-gray-300">
          <thead>
              <tr class="bg-gray-200">
                  <th class="border px-4 py-2">Nom</th>
                  <th class="border px-4 py-2">Email</th>
                  <th class="border px-4 py-2">Numéro</th>
                  <th class="border px-4 py-2">Statut</th>
                  <th class="border px-4 py-2">Date d'inscription</th>
              </tr>
          </thead>
          <tbody>
              @foreach($utilisateurs as $user)
              <tr class="hover:bg-gray-100">
                  <td class="border px-4 py-2">{{ $user->name }}</td>
                  <td class="border px-4 py-2">{{ $user->email }}</td>
                  <td class="border px-4 py-2">{{ $user->telephone ?? '-' }}</td>
                  <td class="border px-4 py-2">{{ $user->statut ?? '-' }}</td>
                  <td class="border px-4 py-2">{{ $user->created_at->format('d/m/Y H:i') }}</td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
  </div>
</div>

<footer>
  © 2025 SoftLather - Tous droits réservés | <a href="#">Mentions légales</a>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
