<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Plateforme de Cours & Épreuves</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="text-gray-800 bg-gray-50">

  <!-- Navbar -->
  <header class="bg-white shadow">
    <div class="container flex items-center justify-between px-4 py-4 mx-auto">
      <h1 class="text-xl font-bold text-blue-700">📘 Plateforme de Cours</h1>
      <nav class="space-x-6 font-medium text-gray-600">
        <a href="#" class="hover:text-blue-600">Accueil</a>
        <a href="#cours" class="hover:text-blue-600">Cours</a>
        <a href="#epreuves" class="hover:text-blue-600">Épreuves</a>
        <a href="#contact" class="hover:text-blue-600">Contact</a>
      </nav>
    </div>
  </header>

  <!-- Hero -->
  <section class="px-4 py-16 text-center text-white bg-blue-600">
    <h2 class="mb-4 text-4xl font-bold">Accédez facilement à vos cours et épreuves</h2>
    <p class="max-w-2xl mx-auto text-lg">Téléchargez les ressources pédagogiques de votre filière en un clic, partout et à tout moment.</p>
  </section>

  <!-- Section Cours -->
  <section id="cours" class="container px-4 py-12 mx-auto">
    <h3 class="mb-6 text-3xl font-bold text-center text-blue-700">📚 Cours disponibles</h3>
    <div class="grid gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
      @foreach ($cours as $item)
      <div class="flex flex-col overflow-hidden bg-white rounded-lg shadow-md">
        <div class="h-48 bg-gray-200">
          <embed src="{{ asset('storage/cours/' . $item->fichier) }}" type="application/pdf" class="w-full h-full" />
        </div>
        <div class="flex flex-col flex-grow p-4">
          <h4 class="mb-1 text-xl font-semibold">{{ $item->titre }}</h4>
          <p class="mb-2 text-sm text-gray-600">
            <strong>Propriétaire:</strong> {{ $item->proprietaire ?? 'Inconnu' }}<br>
            <strong>Semestre:</strong> {{ $item->semestre }}
          </p>
          <p class="mb-4 text-gray-700">{{ $item->description }}</p>
          <div class="flex gap-3 mt-auto">
            <a href="{{ asset('storage/cours/' . $item->fichier) }}" target="_blank" class="px-4 py-2 text-sm text-white transition bg-blue-600 rounded hover:bg-blue-700">Voir</a>
            <a href="{{ asset('storage/cours/' . $item->fichier) }}" download class="px-4 py-2 text-sm text-white transition bg-green-600 rounded hover:bg-green-700">Télécharger</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>

  <!-- Section Épreuves (si besoin) -->
  <section id="epreuves" class="container px-4 py-12 mx-auto">
    <h3 class="mb-6 text-3xl font-bold text-center text-blue-700">📝 Épreuves disponibles</h3>
    <!-- À compléter comme pour les cours -->
    <p class="text-center text-gray-500">Cette section peut afficher les épreuves (à compléter si nécessaire).</p>
  </section>

  <!-- Section Contact -->
  <section id="contact" class="py-12 bg-white">
    <div class="container px-4 mx-auto text-center">
      <h3 class="mb-4 text-3xl font-bold text-blue-700">📩 Contactez-nous</h3>
      <p class="mb-6 text-gray-600">Une question ? Un document manquant ? Contactez-nous via WhatsApp ou e-mail.</p>
      <a href="mailto:contact@monsite.com" class="inline-block px-6 py-3 text-white transition bg-blue-600 rounded hover:bg-blue-700">Envoyer un mail</a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-6 mt-8 text-gray-300 bg-gray-800">
    <div class="container px-4 mx-auto text-center">
      &copy; 2025 - Plateforme de Téléchargement | Tous droits réservés.
    </div>
  </footer>

</body>
</html>
