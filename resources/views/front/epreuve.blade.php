@extends('front.layouts.app')

@section('content')
<div class="px-4 py-10 mx-auto max-w-7xl">

  <!-- FILTRES MULTIPLES -->
  <div class="p-6 mb-8 bg-white rounded-lg shadow">
    <form action="{{ route('epreuves.liste') }}" method="GET" class="grid items-end grid-cols-1 gap-4 md:grid-cols-4">

      <!-- FACULTE -->
      <div>
        <label for="faculter" class="block mb-1 text-sm font-medium text-gray-700">Faculté</label>
        <input type="text" name="faculter" id="faculter" value="{{ request('faculter') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
      </div>

      <!-- DEPARTEMENT -->
      <div>
        <label for="departement" class="block mb-1 text-sm font-medium text-gray-700">Département</label>
        <input type="text" name="departement" id="departement" value="{{ request('departement') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
      </div>

      <!-- FILIERE -->
      <div>
        <label for="filiere_id" class="block mb-1 text-sm font-medium text-gray-700">Filière</label>
        <select name="filiere_id" id="filiere_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
          <option value="">-- Toutes les filières --</option>
          @foreach ($filieres as $filiere)
            <option value="{{ $filiere->id }}" {{ request('filiere_id') == $filiere->id ? 'selected' : '' }}>
              {{ $filiere->nom }}
            </option>
          @endforeach
        </select>
      </div>

      <!-- BOUTON FILTRER -->
      <div>
        <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
          Filtrer
        </button>
      </div>
    </form>
  </div>

  <!-- TITRE -->
  <section id="epreuves" class="container px-4 py-4 mx-auto">
    <h3 class="mb-6 text-3xl font-bold text-center text-blue-700">📝 Épreuves disponibles</h3>

    <!-- LISTE DES ÉPREUVES -->
    <div class="grid gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
      @forelse ($epreuves as $item)
        <div class="flex flex-col overflow-hidden bg-white rounded-lg shadow-md">

          <!-- PREVIEW PDF -->
          <div class="h-64 bg-gray-200">
            @if($item->fichier)
              <object
                data="{{ asset($item->fichier) }}"
                type="application/pdf"
                width="100%"
                height="100%">
                <p class="p-4 text-sm text-center text-gray-600">
                  Votre navigateur ne supporte pas la prévisualisation PDF.<br>
                  <a href="{{ asset($item->fichier) }}" target="_blank" class="text-blue-600 underline">Cliquez ici pour ouvrir le fichier</a>.
                </p>
              </object>
            @else
              <div class="flex items-center justify-center h-full text-sm text-gray-500">
                Aperçu non disponible
              </div>
            @endif
          </div>

          <!-- INFO ÉPREUVE -->
          <div class="flex flex-col flex-grow p-4">
            <h4 class="mb-1 text-xl font-semibold">{{ $item->titre }}</h4>
            <p class="mb-2 text-sm text-gray-600">
              <strong>Session:</strong> {{ ucfirst($item->session) }}<br>
              <strong>Semestre:</strong> {{ $item->semestre }}<br>
              <strong>Professeur:</strong> {{ $item->user->nom ?? 'Inconnu' }}
            </p>
            <p class="mb-4 text-gray-700">
              <strong>Matière:</strong> {{ $item->matiere->titre ?? 'N/A' }}
            </p>

            <!-- BOUTONS -->
            @if($item->fichier)
              <div class="flex gap-3 mt-auto">
                <a href="{{ asset($item->fichier) }}" target="_blank" class="px-4 py-2 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">Voir</a>
                <a href="{{ asset($item->fichier) }}" download class="px-4 py-2 text-sm text-white bg-green-600 rounded hover:bg-green-700">Télécharger</a>
              </div>
            @else
              <p class="mt-auto text-sm text-red-500">Fichier non disponible</p>
            @endif
          </div>

        </div>
      @empty
        <div class="text-center text-gray-500 col-span-full">
          Aucune épreuve trouvée pour ces critères.
        </div>
      @endforelse
    </div>

    <!-- PAGINATION -->
    <div class="mt-8">
      {{ $epreuves->withQueryString()->links() }}
    </div>

  </section>
</div>
@endsection
