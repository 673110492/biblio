@extends('front.layouts.app')
@section('content')
  <!-- HERO SECTION -->
  <section class="relative bg-cover bg-center h-[450px]" style="background-image: url('https://images.unsplash.com/photo-1584697964403-510a94b3f423');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 max-w-4xl px-4 pt-24 mx-auto text-center text-white">
      <h2 class="mb-6 text-3xl font-bold md:text-4xl">
        Téléchargez gratuitement des cours, épreuves et corrigés
      </h2>
      <div class="flex flex-col items-center justify-center gap-2 md:flex-row">
        <input type="text" placeholder="Rechercher un document..." class="w-full md:w-[500px] px-4 py-3 rounded shadow text-gray-800" />
        <button class="px-6 py-3 font-semibold text-white bg-green-500 rounded hover:bg-green-600">
          Rechercher
        </button>
      </div>
      <p class="mt-4 text-sm">Ou <a href="#" class="font-semibold underline">parcourir la bibliothèque</a></p>
    </div>
  </section>

  <!-- CATÉGORIES -->
  <section class="py-16 bg-white">
    <div class="max-w-6xl px-4 mx-auto">
      <h2 class="mb-8 text-2xl font-bold text-center">Catégories disponibles</h2>
      <div class="grid grid-cols-1 gap-6 text-center md:grid-cols-4">
        <div class="p-6 bg-gray-100 shadow rounded-xl">📘 <h3 class="mt-2 font-semibold">Cours</h3></div>
        <div class="p-6 bg-gray-100 shadow rounded-xl">📝 <h3 class="mt-2 font-semibold">Épreuves</h3></div>
        <div class="p-6 bg-gray-100 shadow rounded-xl">✅ <h3 class="mt-2 font-semibold">Corrigés</h3></div>
        <div class="p-6 bg-gray-100 shadow rounded-xl">📚 <h3 class="mt-2 font-semibold">Exercices</h3></div>
      </div>
    </div>
  </section>

  <!-- SECTION À PROPOS DU SITE -->
  <section class="py-16 bg-gray-50">
    <div class="max-w-4xl px-4 mx-auto text-center">
      <h2 class="mb-6 text-2xl font-bold">À propos de Plantix Ressources</h2>
      <p class="text-gray-700">Plantix Ressources est une plateforme éducative gratuite qui propose un accès libre à des milliers de documents scolaires : cours, épreuves, corrigés et supports pédagogiques pour tous les niveaux. Notre mission est de faciliter l'apprentissage et la réussite des élèves, étudiants et enseignants à travers des contenus de qualité soigneusement sélectionnés.</p>
    </div>
  </section>

  <!-- PRÉVISUALISATIONS DE COURS -->
  <section class="py-16 bg-white">
    <div class="max-w-6xl px-4 mx-auto">
      <h2 class="mb-8 text-2xl font-bold text-center">Cours récents avec prévisualisation</h2>
      <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="overflow-hidden rounded shadow bg-gray-50">
          <iframe src="https://docs.google.com/gview?url=http://www.africau.edu/images/default/sample.pdf&embedded=true" class="w-full h-48"></iframe>
          <div class="p-4">
            <h3 class="text-lg font-semibold">Cours de Mathématiques - Dérivées</h3>
            <a href="#" class="text-sm text-blue-600 hover:underline">Télécharger PDF</a>
          </div>
        </div>
        <div class="overflow-hidden rounded shadow bg-gray-50">
          <iframe src="https://docs.google.com/gview?url=http://www.africau.edu/images/default/sample.pdf&embedded=true" class="w-full h-48"></iframe>
          <div class="p-4">
            <h3 class="text-lg font-semibold">Cours de Physique - Ondes</h3>
            <a href="#" class="text-sm text-blue-600 hover:underline">Télécharger PDF</a>
          </div>
        </div>
        <div class="overflow-hidden rounded shadow bg-gray-50">
          <iframe src="https://docs.google.com/gview?url=http://www.africau.edu/images/default/sample.pdf&embedded=true" class="w-full h-48"></iframe>
          <div class="p-4">
            <h3 class="text-lg font-semibold">Cours d'Histoire - Révolution Française</h3>
            <a href="#" class="text-sm text-blue-600 hover:underline">Télécharger PDF</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION AVANTAGES -->
  <section class="py-16 bg-gray-100">
    <div class="max-w-6xl px-4 mx-auto text-center">
      <h2 class="mb-8 text-2xl font-bold">Pourquoi choisir Plantix ?</h2>
      <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="p-6 bg-white rounded shadow">
          <h3 class="mb-2 text-lg font-semibold">📂 Ressources variées</h3>
          <p class="text-sm text-gray-600">Des documents dans toutes les matières, pour tous les niveaux scolaires.</p>
        </div>
        <div class="p-6 bg-white rounded shadow">
          <h3 class="mb-2 text-lg font-semibold">🚀 Téléchargement rapide</h3>
          <p class="text-sm text-gray-600">Accès instantané aux fichiers sans inscription obligatoire.</p>
        </div>
        <div class="p-6 bg-white rounded shadow">
          <h3 class="mb-2 text-lg font-semibold">🎓 Soutien à la réussite</h3>
          <p class="text-sm text-gray-600">Une aide concrète pour les élèves, enseignants et parents.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- TÉMOIGNAGES -->
  <section class="py-16 bg-white">
    <div class="max-w-4xl px-4 mx-auto text-center">
      <h2 class="mb-10 text-2xl font-bold">Témoignages d'utilisateurs</h2>
      <div class="space-y-8">
        <blockquote class="italic text-gray-700">
          "J’ai réussi mes examens grâce aux sujets et corrigés partagés ici. Merci !"
          <div class="mt-2 text-sm font-semibold">— Amine, Lycéen</div>
        </blockquote>
        <blockquote class="italic text-gray-700">
          "Une vraie mine d'or pour les profs qui veulent des supports sérieux."
          <div class="mt-2 text-sm font-semibold">— Mme Diallo, Enseignante</div>
        </blockquote>
      </div>
    </div>
  </section>
@endsection
