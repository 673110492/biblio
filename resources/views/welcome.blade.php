<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des cours</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f3f6;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card embed {
            width: 100%;
            height: 200px;
            border: none;
        }

        .card-body {
            padding: 15px;
        }

        .card h2 {
            margin: 10px 0;
            font-size: 18px;
            color: #1a1a1a;
        }

        .info {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .description {
            font-size: 14px;
            color: #444;
            margin-bottom: 10px;
        }

        .buttons-container {
            display: flex;
            gap: 10px;
            margin-top: auto;
        }

        .button {
            display: inline-block;
            padding: 8px 14px;
            font-size: 13px;
            text-align: center;
            color: white;
            background-color: #007BFF;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 400px) {
            .card-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <h1>📚 Liste des cours disponibles</h1>

    <div class="card-container">
        @foreach ($cours as $cours)
            <div class="card">
                {{-- Aperçu PDF en haut --}}
                <embed src="{{ asset('storage/cours/' . $cours->fichier) }}" type="application/pdf" />

                <div class="card-body">
                    {{-- Titre --}}
                    <h2>{{ $cours->titre }}</h2>

                    {{-- Infos --}}
                    <p class="info">
                        <strong>Propriétaire :</strong> {{ $cours->proprietaire ?? 'Inconnu' }}<br>
                        <strong>Semestre :</strong> {{ $cours->semestre }}
                    </p>

                    {{-- Description --}}
                    <p class="description">{{ $cours->description }}</p>

                    {{-- Boutons --}}
                    <div class="buttons-container">
                        <a class="button" href="{{ asset('storage/cours/' . $cours->fichier) }}" target="_blank">👁️ Voir</a>
                        <a class="button" href="{{ asset('storage/cours/' . $cours->fichier) }}" download>⬇️ Télécharger</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
