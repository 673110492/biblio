<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Connexion - Institut Supérieur</title>
  <style>
    *, *::before, *::after {
      box-sizing: border-box;
    }
    body {
      margin: 0; padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #4a90e2 0%, #145dbe 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #333;
    }
    .container {
      background: #fff;
      padding: 3.5rem 3rem;
      border-radius: 12px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.2);
      max-width: 480px;
      width: 100%;
    }
    .logo {
      width: 80px;
      height: 80px;
      margin: 0 auto 2rem auto;
      background: #145dbe;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 1.6rem;
      color: white;
      user-select: none;
      box-shadow: 0 4px 12px rgba(20, 93, 190, 0.6);
      letter-spacing: 1px;
    }
    h2 {
      font-weight: 700;
      color: #145dbe;
      margin: 0 0 0.3rem 0;
      font-size: 1.5rem;
      text-align: center;
      line-height: 1.2;
    }
    .subtitle {
      text-align: center;
      color: #555;
      font-weight: 500;
      margin-bottom: 2.5rem;
      font-size: 1rem;
      line-height: 1.4;
    }
    .subtitle a {
      color: #145dbe;
      font-weight: 600;
      text-decoration: none;
    }
    .subtitle a:hover {
      text-decoration: underline;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    .input-group {
      position: relative;
      margin-bottom: 1.8rem;
    }
    .input-group svg {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      width: 22px;
      height: 22px;
      fill: #145dbe;
      opacity: 0.8;
    }
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.85rem 1rem 0.85rem 46px;
      font-size: 1.1rem;
      border: 1.8px solid #ccc;
      border-radius: 10px;
      transition: border-color 0.3s ease;
    }
    input[type="email"]:focus,
    input[type="password"]:focus {
      border-color: #145dbe;
      outline: none;
    }
    .error {
      color: #d9534f;
      font-size: 0.9rem;
      margin-top: 0.35rem;
    }
    .forgot-link {
      text-align: right;
      margin-top: -1.2rem;
      margin-bottom: 2.3rem;
    }
    .forgot-link a {
      color: #145dbe;
      font-size: 0.9rem;
      text-decoration: none;
      font-weight: 600;
    }
    .forgot-link a:hover {
      text-decoration: underline;
    }
    button {
      background-color: #145dbe;
      border: none;
      color: white;
      font-weight: 700;
      font-size: 1.2rem;
      padding: 0.85rem;
      border-radius: 12px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    button:hover {
      background-color: #0d3a85;
    }
    .visually-hidden {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      border: 0;
    }
    @media (max-width: 480px) {
      .container {
        padding: 2.5rem 2rem;
      }
      h2 {
        font-size: 1.3rem;
      }
      .logo {
        width: 70px;
        height: 70px;
        font-size: 1.3rem;
        margin-bottom: 1.5rem;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="logo">LOGO</div>

    <h2>Connexion à la plateforme</h2>

    <p class="subtitle">
      Veuillez utiliser vos identifiants pour vous connecter.<br />
      Si vous n'êtes pas membre, veuillez
      <a href="{{ route('register') }}">vous inscrire</a>.
    </p>

    <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate>
      @csrf

      <div class="input-group">
        <label for="email" class="visually-hidden">Adresse Email</label>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 2v.01L12 13 4 6.01V6h16Zm-16 12V8l7.56 5.66a1 1 0 0 0 1.12 0L20 8v10H4Z"/>
        </svg>
        <input
          id="email"
          type="email"
          name="email"
          placeholder="Email"
          required
          autocomplete="email"
          value="{{ old('email') }}"
          autofocus
        />
        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <div class="input-group">
        <label for="password" class="visually-hidden">Mot de passe</label>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M17 8V7a5 5 0 0 0-10 0v1H5v12h14V8h-2Zm-6-1a3 3 0 0 1 6 0v1H11V7Zm7 11H6v-9h12v9Z"/>
        </svg>
        <input
          id="password"
          type="password"
          name="password"
          placeholder="Mot de passe"
          required
          autocomplete="current-password"
        />
        @error('password')
        <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <div class="forgot-link">
        <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
      </div>

      <button type="submit">Connexion</button>
    </form>
  </div>

</body>
</html>
