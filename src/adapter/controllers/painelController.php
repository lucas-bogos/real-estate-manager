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
  $imageImmobile = isset($_FILES["picture"]) ? '' : $dir.$file["name"];

  // Move o arquivo da pasta temporaria de upload para a pasta de destino 
  move_uploaded_file($file["tmp_name"], "$dir/".$file["name"]);

  // verifica se os campos estão preenchidos
  $address = isset($_POST["address"]) ? htmlspecialchars(filter_input(INPUT_POST, 'address'), ENT_QUOTES) : null;
  $value = isset($_POST["value"]) ? filter_input(INPUT_POST, 'value', FILTER_VALIDATE_INT) : null;
  $quantityRoom = isset($_POST["room"]) ? intval(htmlspecialchars(filter_input(INPUT_POST, 'room'), ENT_QUOTES)) : null;
  $condominium = 0;
  $backyard = false;

  if(!empty($_POST["condominium"])) {
    $condominium = intval(htmlspecialchars($_POST["condominium"], ENT_QUOTES));
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