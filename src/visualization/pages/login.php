<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Entrar na Real Estate Manager</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='/assets/styles/login-page.css'>
</head>
<body>
  <!-- tela de login -->
  <div id="login">
    <form class="card" method="POST" action="/entrar">
      <div class="card-header">
      <img id="img-logo-top" src="/assets/images/house-green.png" alt="logo-real-estate-manager">
        <h2>Real Estate Manager</h2>
      </div>
      <div class="card-content">
        <div class="card-content-area">
          <label for="email">E-mail</label>
          <input name="email" type="email" id="email" required autocomplete="off">
        </div>
        <div class="card-content-area">
          <label for="password">Senha</label>
          <input name="password" type="password" id="password" required autocomplete="off">
        </div>
      </div>
      <div class="card-footer">
        <input type="submit" value="Login" class="submit">
        <a href="/registrar">Não tem cadastro ainda?</a>
      </div>
    </form>
  </div>
</body>
</html>