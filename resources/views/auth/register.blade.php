<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inscription</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #1e3c72, #2a5298);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .container {
      background: #fff;
      color: #333;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #2a5298;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 20px;
      font-size: 1em;
    }

    input[type="submit"] {
      background-color: #2a5298;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1em;
      transition: background 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #1e3c72;
    }

    .login-link {
      margin-top: 15px;
      text-align: center;
    }

    .login-link a {
      color: #2a5298;
      text-decoration: none;
      font-weight: bold;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .container {
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Créer un compte</h2>
    <form method="POST" action="/register">
      <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required />

      <label for="prenom">Prénom</label>
      <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required />

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="exemple@mail.com" required />

      <label for="password">Mot de passe</label>
      <input type="password" id="password" name="password" placeholder="********" required />

      <input type="submit" value="S'inscrire" />
    </form>
    <div class="login-link">
      Déjà inscrit ? <a href="/login">Se connecter</a>
    </div>
  </div>
</body>
</html>
