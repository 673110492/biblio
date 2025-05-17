<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Acorn Admin</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .left {
            flex: 1;
            background: url('{{ asset('assets/img/IMG_2511.JPG') }}') no-repeat center center;
            background-size: cover;
            display: none;
        }

        @media (min-width: 992px) {
            .left {
                display: block;
            }
        }

        .right {
            flex: 1;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        }

        .form-box {
            width: 100%;
            max-width: 400px;
        }

        h2 {
            color: #0d6efd;
            margin-bottom: 10px;
        }

        p {
            color: #6c757d;
            margin-bottom: 20px;
        }

        a {
            color: #0d6efd;
            text-decoration: none;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #0d6efd;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0b5ed7;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -8px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Image à gauche -->
        <div class="left"></div>

        <!-- Formulaire à droite -->
        <div class="right">
            <div class="form-box">
                <h2>Bienvenue !</h2>
                <p>Veuillez remplir le formulaire pour vous inscrire.</p>
                <p>Déjà membre ? <a href="{{ route('login') }}">Connectez-vous</a></p>

                <form method="POST" action="{{ route('register') }}" novalidate>
                    @csrf

                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom') }}" placeholder="Votre nom">
                    @error('nom')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" id="prenom" name="prenom" class="form-control" value="{{ old('prenom') }}" placeholder="Votre prénom">
                    @error('prenom')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="exemple@domaine.com">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="********">
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
