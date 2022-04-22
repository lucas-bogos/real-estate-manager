<?php

declare(strict_types=1);

use source\repositories\apartament\AddApartamentRepo;
use source\repositories\house\AddHouseRepo;

$method = $_SERVER["REQUEST_METHOD"];

if($method == "POST") {
  // diretório para onde será armazenado
  $dir = "uploads/"; 

  // recebendo o arquivo multipart 
  $file = $_FILES["picture"]; 

  // string que irá para o banco de dados
  $imageImmobile = $dir.$file["name"];

  // Move o arquivo da pasta temporaria de upload para a pasta de destino 
  move_uploaded_file($file["tmp_name"], "$dir/".$file["name"]);

  // verifica se os campos estão preenchidos
  $address = isset($_POST["address"]) ? $_POST["address"] : null;
  $value = isset($_POST["value"]) ? intval($_POST["value"]) : null;
  $quantityRoom = isset($_POST["room"]) ? intval($_POST["room"]) : null;
  $condominium = 0;
  $backyard = false;

  if(!empty($_POST["condominium"])) {
    $condominium = intval($_POST["condominium"]);
    AddApartamentRepo::save($condominium, $imageImmobile, $value, $address, $quantityRoom);
  }

  if(!empty($_POST["backyard"]) && empty($_POST["condominium"])) {
    $backyard = $_POST["backyard"] == "true" ? true : false;
    AddHouseRepo::save($backyard, $imageImmobile, $value, $address, $quantityRoom);
  }

  header("Location: /");
}

if($method == "GET") {
  include __DIR__."/../../visualization/pages/painel.php";
}