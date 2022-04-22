<?php

declare(strict_types=1);

use source\repositories\user\RegisterUserRepo;

$method = $_SERVER["REQUEST_METHOD"];

if($method == "POST") {
  // verifica se os campos estão preenchidos
  $name = isset($_POST["name"])? $_POST["name"]: null;
  $email = isset($_POST["email"])? $_POST["email"]: null;
  $pass = isset($_POST["password"])? $_POST["password"]: null;
  // repositório para salvar user no banco de dados
  $isRegisted = RegisterUserRepo::save($name, $email, $pass);
  if($isRegisted) {
    header("Location: /entrar");
  } else {
    header("Location: /registrar");
  } 
}

if($method == "GET") {
  include_once __DIR__."/../../visualization/pages/register.php";
}