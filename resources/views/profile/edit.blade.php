<x-app-layout>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- NAVBAR -->
    <nav class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/softlather.jpg') }}" alt="Logo" class="h-10 w-10 rounded">
                    <span class="text-xl font-bold">SoftLather</span>
                </div>

                <!-- Menu -->
                <div class="flex items-center gap-6">
                    <a href="{{ route('platformtechnique') }}" class="flex items-center gap-1 hover:text-gray-300">
                        <i class="fa fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="{{ route('calcul') }}" class="flex items-center gap-1 hover:text-gray-300">
                        <i class="fa fa-calculator"></i> Calculs
                    </a>
                    <a href="{{ route('Rapport') }}" class="flex items-center gap-1 hover:text-gray-300">
                        <i class="fa fa-file-alt"></i> Rapports
                    </a>

                    <!-- Notifications Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="relative flex items-center gap-1 hover:text-gray-300">
                            <i class="fas fa-bell fa-lg"></i> 
                            <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-600 rounded-full"></span>
                        </button>

                        <div x-show="open" @click.away="open = false" 
                             class="absolute right-0 mt-2 w-80 bg-white text-gray-800 rounded shadow-lg py-2 z-50">
                            <h6 class="font-semibold px-4 py-2 border-b">Notifications récentes</h6>
                            <div class="max-h-64 overflow-y-auto">
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200">
                                    Rapport énergétique généré - <span class="text-sm text-gray-500">13/10/2025</span>
                                </a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200">
                                    Nouvelle alerte sur CTA - <span class="text-sm text-gray-500">12/10/2025</span>
                                </a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200">
                                    Rapport supprimé - <span class="text-sm text-gray-500">11/10/2025</span>
                                </a>
                            </div>
                            <div class="text-center border-t mt-2 pt-2">
                                <a href="#" class="text-sm text-blue-600 hover:underline">Voir toutes les notifications</a>
                            </div>
                        </div>
                    </div>

                    <!-- Dropdown utilisateur -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-1 hover:text-gray-300">
                            <i class="fa fa-user"></i> {{ Auth::user()->name }} <i class="fas fa-chevron-down"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded shadow-lg py-2 z-50">
                            <a href="{{ route('voirprofil') }}" class="block px-4 py-2 hover:bg-gray-200"><i class="fa fa-id-badge"></i> Voir profil</a>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-200">⚙️ Paramètres</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-200">
                                    <i class="fa fa-sign-out-alt"></i> Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <!-- CONTENU PRINCIPAL -->
    <div class="p-6 sm:p-10 bg-white shadow sm:rounded-lg mt-6 max-w-4xl mx-auto">
        <div class="max-w-xl mx-auto">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white mt-10 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h4 class="text-lg font-semibold mb-2">Obtenez un devis gratuit</h4>
            <p class="mb-2"><i class="fas fa-map-marker-alt"></i> 
                <a href="https://www.google.com/maps?q=21+AV.+Jean+Moulin+Montreuil+93100" target="_blank" class="hover:text-gray-400">21 AV. Jean Moulin Montreuil 93100</a>
            </p>
            <p class="mb-2">Contactez-nous pour discuter de votre projet informatique et GTB.</p>
            <p class="mb-2"><i class="fas fa-phone"></i> Téléphone : <a href="tel:+338181840130" class="hover:text-gray-400">01 81 84 01 30</a></p>
            <p class="mb-2"><i class="fas fa-envelope"></i> <a href="mailto:contact@softlather.com" class="hover:text-gray-400">contact@softlather.com</a></p>
            <p class="mb-2"><i class="fab fa-linkedin"></i> <a href="https://www.linkedin.com/in/islam-maaziz" target="_blank" class="hover:text-gray-400">LinkedIn</a></p>
            <p class="mt-4 text-sm">&copy; {{ date('Y') }} SoftLather. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Alpine.js pour dropdown -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</x-app-layout>
