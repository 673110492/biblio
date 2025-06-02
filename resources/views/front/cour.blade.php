@extends('front.layouts.app')

@section('content')
<div class="px-4 py-10 mx-auto max-w-7xl">

  <!-- FILTRE PAR FILIERE -->
  <div class="p-6 mb-8 bg-white rounded-lg shadow">
    <form action="{{ route('cours.liste') }}" method="GET" class="grid items-end grid-cols-1 gap-4 md:grid-cols-4">
      <div class="md:col-span-3">
        <label for="filiere_id" class="block mb-1 text-sm font-medium text-gray-700">Choisir une filière :</label>
        <select name="filiere_id" id="filiere_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
          <option value="">-- Toutes les filières --</option>
          @foreach ($filieres as $filiere)
            <option value="{{ $filiere->id }}" {{ request('filiere_id') == $filiere->id ? 'selected' : '' }}>
              {{ $filiere->nom }}
            </option>
          @endforeach
        </select>
      </div>
      <div>
        <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
          Filtrer
        </button>
      </div>
    </form>
  </div>

  <!-- TITRE -->
  <section id="cours" class="container px-4 py-4 mx-auto">
    <h3 class="mb-6 text-3xl font-bold text-center text-blue-700">📚 Cours disponibles</h3>

    <!-- LISTE DES COURS -->
    <div class="grid gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
      @forelse ($cours as $item)
        <div class="flex flex-col overflow-hidden bg-white rounded-lg shadow-md">
          <div class="h-48 bg-gray-200">
            @if($item->fichier && file_exists(public_path('storage/' . $item->fichier)))
              <embed src="{{ asset('storage/' . $item->fichier) }}" type="application/pdf" class="w-full h-full" />
            @else
              <div class="flex items-center justify-center h-full text-sm text-gray-500">
                Aperçu non disponible
              </div>
            @endif
          </div>
          <div class="flex flex-col flex-grow p-4">
            <h4 class="mb-1 text-xl font-semibold">{{ $item->titre }}</h4>
            <p class="mb-2 text-sm text-gray-600">
              <strong>Propriétaire:</strong> {{ $item->proprietaire ?? 'Inconnu' }}<br>
              <strong>Semestre:</strong> {{ $item->semestre }}
            </p>
            <p class="mb-4 text-gray-700">{{ $item->description }}</p>
            @if($item->fichier && file_exists(public_path('storage/' . $item->fichier)))
              <div class="flex gap-3 mt-auto">
                <a href="{{ asset('storage/' . $item->fichier) }}" target="_blank" class="px-4 py-2 text-sm text-white transition bg-blue-600 rounded hover:bg-blue-700">Voir</a>
                <a href="{{ asset('storage/' . $item->fichier) }}" download class="px-4 py-2 text-sm text-white transition bg-green-600 rounded hover:bg-green-700">Télécharger</a>
              </div>
            @else
              <p class="mt-auto text-sm text-red-500">Fichier non disponible</p>
            @endif
          </div>
        </div>
      @empty
        <div class="text-center text-gray-500 col-span-full">
          Aucun cours trouvé pour cette filière.
        </div>
      @endforelse
    </div>

    <!-- PAGINATION -->
    <div class="mt-8">
      {{ $cours->withQueryString()->links() }}
    </div>

  </section>
</div>
@endsection
