@extends('front.layouts.app')

@section('content')
  <!-- HERO SECTION avec carousel -->
  <section class="relative h-[450px] overflow-hidden md:h-[600px]">
    <!-- Conteneur du carousel -->
    <div id="carousel" class="absolute inset-0">
      <div
        class="absolute inset-0 transition-opacity duration-700 bg-center bg-cover opacity-100"
        style="background-image: url('{{ asset('assets1/image4.jpeg') }}');"
        data-index="0"
      ></div>
      <div
        class="absolute inset-0 transition-opacity duration-700 bg-center bg-cover opacity-0"
        style="background-image: url('{{ asset('assets1/image2.jpeg') }}');"
        data-index="1"
      ></div>
      <div
        class="absolute inset-0 transition-opacity duration-700 bg-center bg-cover opacity-0"
        style="background-image: url('{{ asset('assets1/image3.jpeg') }}');"
        data-index="2"
      ></div>
    </div>

    <!-- Overlay sombre -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Contenu -->
    <div class="relative z-10 max-w-4xl px-4 pt-24 mx-auto text-center text-white">
      <h2 class="mb-6 text-3xl font-bold md:text-4xl">
        Téléchargez gratuitement des cours, épreuves et corrigés
      </h2>

      <p class="mt-4 text-sm">
        Ou
        <a href="#" class="font-semibold underline">parcourir la bibliothèque</a>
      </p>

      <p class="mt-2 text-xs italic">Bienvenue sur <span class="font-bold">BookNest</span></p>
    </div>

    <!-- Boutons de navigation -->
    <button
      id="prev"
      class="absolute z-20 p-3 text-white -translate-y-1/2 bg-black rounded-full top-1/2 left-4 bg-opacity-40 hover:bg-opacity-70"
      aria-label="Slide précédente"
      type="button"
    >
      &#10094;
    </button>
    <button
      id="next"
      class="absolute z-20 p-3 text-white -translate-y-1/2 bg-black rounded-full top-1/2 right-4 bg-opacity-40 hover:bg-opacity-70"
      aria-label="Slide suivante"
      type="button"
    >
      &#10095;
    </button>
  </section>

  <!-- Script du carousel -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const slides = document.querySelectorAll('#carousel > div');
      const prevBtn = document.getElementById('prev');
      const nextBtn = document.getElementById('next');
      let current = 0;
      const total = slides.length;

      function showSlide(index) {
        slides.forEach((slide, i) => {
          if(i === index){
            slide.style.opacity = '1';
            slide.style.zIndex = '10';
          } else {
            slide.style.opacity = '0';
            slide.style.zIndex = '0';
          }
        });
      }

      function nextSlide() {
        current = (current + 1) % total;
        showSlide(current);
      }

      function prevSlide() {
        current = (current - 1 + total) % total;
        showSlide(current);
      }

      nextBtn.addEventListener('click', () => {
        nextSlide();
        resetInterval();
      });

      prevBtn.addEventListener('click', () => {
        prevSlide();
        resetInterval();
      });

      showSlide(current);

      // Auto slide toutes les 5 secondes
      let slideInterval = setInterval(nextSlide, 5000);

      function resetInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 5000);
      }
    });
  </script>

  <!-- CATÉGORIES -->
  <section class="py-16 bg-white">
    <div class="max-w-6xl px-4 mx-auto">
      <h2 class="mb-8 text-2xl font-bold text-center">Catégories disponibles</h2>
      <div class="grid grid-cols-1 gap-6 text-center md:grid-cols-4">
        <div class="p-6 bg-gray-100 shadow rounded-xl">
          <img
            src="{{ asset('assets1/image1.jpeg') }}"
            alt="Cours"
            class="object-cover w-16 h-16 mx-auto"
          />
          <h3 class="mt-2 font-semibold">Cours</h3>
        </div>
        <div class="p-6 bg-gray-100 shadow rounded-xl">
          <img
            src="{{ asset('assets1/image2.jpeg') }}"
            alt="Épreuves"
            class="object-cover w-16 h-16 mx-auto"
          />
          <h3 class="mt-2 font-semibold">Épreuves</h3>
        </div>
        <div class="p-6 bg-gray-100 shadow rounded-xl">
          <img
            src="{{ asset('assets1/image3.jpeg') }}"
            alt="Corrigés"
            class="object-cover w-16 h-16 mx-auto"
          />
          <h3 class="mt-2 font-semibold">Corrigés</h3>
        </div>
        <div class="p-6 bg-gray-100 shadow rounded-xl">
          <img
            src="{{ asset('assets1/exercices-icon.png') }}"
            alt="Exercices"
            class="object-cover w-16 h-16 mx-auto"
          />
          <h3 class="mt-2 font-semibold">Exercices</h3>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION À PROPOS DU SITE -->
  <section class="py-16 bg-gray-50">
    <div class="max-w-4xl px-4 mx-auto text-center">
      <h2 class="mb-6 text-2xl font-bold">À propos de BookNest</h2>
      <p class="leading-relaxed text-gray-700">
        BookNest est une plateforme éducative gratuite qui propose un accès libre à
        des milliers de documents scolaires : cours, épreuves, corrigés et supports pédagogiques
        pour tous les niveaux. Notre mission est de faciliter l'apprentissage et la réussite
        des élèves, étudiants et enseignants à travers des contenus de qualité soigneusement
        sélectionnés.
      </p>
    </div>
  </section>

  <!-- PRÉVISUALISATIONS DE COURS -->
  <section class="py-16 bg-white">
    <div class="max-w-6xl px-4 mx-auto">
      <h2 class="mb-8 text-2xl font-bold text-center">Cours récents avec prévisualisation</h2>
      <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="overflow-hidden rounded shadow bg-gray-50">
          <iframe
            src="https://docs.google.com/gview?url=http://www.africau.edu/default/sample.pdf&embedded=true"
            class="w-full h-48"
            title="Cours de Mathématiques - Dérivées"
            loading="lazy"
          ></iframe>
          <div class="p-4">
            <h3 class="text-lg font-semibold">Cours de Mathématiques - Dérivées</h3>
            <a href="#" class="text-sm text-blue-600 hover:underline">Télécharger PDF</a>
          </div>
        </div>
        <div class="overflow-hidden rounded shadow bg-gray-50">
          <iframe
            src="https://docs.google.com/gview?url=http://www.africau.edu/default/sample.pdf&embedded=true"
            class="w-full h-48"
            title="Cours de Physique - Ondes"
            loading="lazy"
          ></iframe>
          <div class="p-4">
            <h3 class="text-lg font-semibold">Cours de Physique - Ondes</h3>
            <a href="#" class="text-sm text-blue-600 hover:underline">Télécharger PDF</a>
          </div>
        </div>
        <div class="overflow-hidden rounded shadow bg-gray-50">
          <iframe
            src="https://docs.google.com/gview?url=http://www.africau.edu/default/sample.pdf&embedded=true"
            class="w-full h-48"
            title="Cours d'Histoire - Révolution Française"
            loading="lazy"
          ></iframe>
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
      <h2 class="mb-8 text-2xl font-bold">Pourquoi choisir BookNest ?</h2>
      <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="p-6 bg-white rounded shadow">
          <h3 class="mb-2 text-lg font-semibold">📂 Ressources variées</h3>
          <p class="text-sm text-gray-600">
            Des documents dans toutes les matières, pour tous les niveaux scolaires.
          </p>
        </div>
        <div class="p-6 bg-white rounded shadow">
          <h3 class="mb-2 text-lg font-semibold">🚀 Téléchargement rapide</h3>
          <p class="text-sm text-gray-600">
            Accès instantané aux fichiers sans inscription obligatoire.
          </p>
        </div>
        <div class="p-6 bg-white rounded shadow">
          <h3 class="mb-2 text-lg font-semibold">🎓 Soutien à la réussite</h3>
          <p class="text-sm text-gray-600">
            Une aide concrète pour les élèves, enseignants et parents.
          </p>
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
