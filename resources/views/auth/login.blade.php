<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Connexion - Institut Supérieur</title>
  <style>
    /* ... même style que celui que tu as donné, inchangé ... */
  </style>
</head>
<body>

  <div class="container">
    <!-- Logo textuel ou image -->
    <div class="logo">
      LOGO
      <!-- <img src="logo.png" alt="Logo" /> -->
    </div>

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
        <!-- Icon mail -->
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
        <!-- Icon lock -->
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
