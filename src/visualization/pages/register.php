<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Fazer meu cadastro na Real Estate Manager</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='/assets/styles/login-page.css'>
</head>
<body>
  <!-- tela de cadastro -->
  <div id="login">
    <form method="POST" action="/registrar" class="card">
      <div class="card-header">
        <img id="img-logo-top" src="/assets/images/house-green.png" alt="logo-real-estate-manager">
        <h2>Faça agora seu cadastro!</h2>
      </div>
      <div class="card-content">
        <div class="card-content-area">
          <label for="name">Nome</label>
          <input type="text" id="name" name="name" required autocomplete="off">
        </div>
        <div class="card-content-area">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" required autocomplete="off">
        </div>
        <div class="card-content-area">
          <label for="password">Senha</label>
          <input id="password" type="password" name="password" class="form-control"
            minlength="8" required autocomplete="off">
        </div>
        <div class="card-content-area">
          <label for="checkPassword">Confirma senha</label>
          <input id="checkPassword" type="password" name="checkPassword" class="form-control"
            minlength="8" required autocomplete="off">
        </div>
      </div>
      <span id="lengthLower" style="color: #FF6961; display: none; font-size: 12px;">
        <p>Insira mais caracteres!</p>
      </span>
      <span id="incorrectPass" style="color: #FF6961; display: none; font-size: 12px;">
        <p>Senhas estão diferentes!</p>
      </span>
      <div class="card-footer">
        <input type="submit" value="Registrar" class="submit">
      </div>
    </form>
  </div>
  <script src="/assets/js/validation-form-register.js"></script>
</body>
</html>