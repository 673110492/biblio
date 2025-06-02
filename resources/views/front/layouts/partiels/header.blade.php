<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plateforme Éducative</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="text-gray-800 bg-gray-100">

    <!-- HEADER -->
    <header class="bg-white shadow">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-4">
                <!-- Logo avec avatar -->
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Plantix"
                        class="object-cover w-10 h-10 rounded-full">
                    <h1 class="text-2xl font-extrabold text-blue-600">Plantix Ressources</h1>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden space-x-8 text-sm font-medium text-gray-700 md:flex">
                    <a href="#" class="transition hover:text-blue-600">Accueil</a>
                    <a href="{{ route('cours.liste') }}" class="hover:text-blue-600">Cours</a>
                    <a href="{{ route('epreuves.liste') }}" class="hover:text-blue-600">Épreuve</a>
                    <a href="#" class="transition hover:text-blue-600">Faxe</a>
                </nav>

                <!-- Connexion -->
                <div class="hidden md:block">
                    <a href="{{ route('login') }}"
                        class="px-5 py-2 font-semibold text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                        Se connecter
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="menu-btn" class="focus:outline-none">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden px-4 pb-4 md:hidden">
            <nav class="flex flex-col space-y-2 text-sm text-gray-700">
                <a href="#" class="hover:text-blue-600">Accueil</a>
                <a href="{{ route('cours.index') }}" class="hover:text-blue-600">Cours</a>
                <a href="#" class="hover:text-blue-600">Épreuve</a>
                <a href="#" class="hover:text-blue-600">Faxe</a>
                <a href="{{ route('login') }}"
                    class="px-4 py-2 mt-2 text-center text-white bg-blue-600 rounded hover:bg-blue-700">
                    Se connecter
                </a>
            </nav>
        </div>
    </header>

    <!-- Script pour le menu mobile -->
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
