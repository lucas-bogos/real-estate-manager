<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Real State Manager</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='/assets/styles/global.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/assets/styles/painel-page.css'>   
</head>
<body>
  <!-- menu nav -->
  <?php include(__DIR__.'/../partials/menu.php'); ?>
  <!-- header -->
  <div class="header">
    <h1>Adicionar um novo imóvel</h1>
  </div>
  <!-- conteúdo da página -->
  <div id="painel-page">
    <form method="POST" action="/painel/adicionar" enctype="multipart/form-data">
      <div>
        <label for="file">Imagem do imóvel: </label>
        <input id="file" type="file" name="picture" />
      </div>
      <div>
        <label for="address">Endereço: </label>
        <input type="text" name="address" required autocomplete="off"><br><br>
      </div>
      <div>
        <label for="value">Valor do Imóvel: </label>
        <input type="number" name="value" required autocomplete="off"><br><br>
      </div>
      <div>
        <label for="room">Quantidade de quartos: </label>
        <input type="number" name="room" required autocomplete="off"><br><br>
      </div>
      <div>
        <label for="condominium">Se for apartamento, quanto custa o condomínio? </label>
        <input type="number" name="condominium" autocomplete="off"><br><br>
      </div>
      <div>
        <label for="backyard">Se for casa, possui quintal? </label>
        <select name="backyard" id="backyard">
          <option selected>Selecione uma opção</option>
          <option value="true">Sim</option>
          <option value="false">Não</option>
        </select>
      </div>
    <br><button id="button-sign" value="submit-immobile">Cadastre</button>
    <input id="button-sign" style="background-color: red;" type="reset" value="Limpar">
    </form>
  </div>
  <?php include(__DIR__."/../partials/footer.php"); ?>
</body>
</html>