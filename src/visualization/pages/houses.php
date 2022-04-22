<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Real Estate Manager</title>
  <link rel="stylesheet" href="/assets/styles/main-page.css">
  <link rel="stylesheet" href="/assets/styles/global.css">
</head>
<body>
  <?php include(__DIR__.'/../partials/menu.php'); ?>
  <!-- header -->
  <div class="header">
    <h1>Encontre a morada dos sonhos</h1>
  </div>
  <main>
    <?php
      use source\repositories\immobile\ShowAllHouses;

      $immobiles = ShowAllHouses::get();
      foreach($immobiles as $immobile) {
        $hasBackyard = $immobile["backyard"] == 0 ? "não possui quintal, porém uma bela paisagem": "possui um lindo quintal para você";
        $image = empty($immobile["imageImmobile"]) ? "/assets/images/sem-imagem.jpg" : "/".$immobile["imageImmobile"];

        echo '
          <div class="column">
            <h2 id="title-city">'.$immobile["address"].'</h2>
            <div class="card">
              <img src="'.$image.'" style="width:100%">
              <h3>'.$immobile["room"].' quartos</h3>
              <p class="price"><span style="font-size: 14px;">Por apenas </span><br>R$ '.$immobile["value"].'</p>
              <p class="description">
                Casa com '.$immobile["room"].' quartos, onde '.$hasBackyard.'.
              </p>
              <a href="#">Saiba mais</a>
            </div>
          </div>
        ';
      }
    ?>
  </main>
  <?php include(__DIR__.'/../partials/footer.php'); ?>
</body>
</html>