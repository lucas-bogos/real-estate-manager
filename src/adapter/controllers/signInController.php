<?php

declare(strict_types=1);

use source\repositories\user\SignInUserRepo;

$method = $_SERVER["REQUEST_METHOD"];

if($method == "POST") {
  // verifica se os campos estão preenchidos
  $email = isset($_POST["email"])? $_POST["email"]: null;
  $pass = isset($_POST["password"])? $_POST["password"]: null;
  // chama o repositório para fazer login
  $userLogged = SignInUserRepo::login($email, $pass);
  if($userLogged) {
    header("Location: /");
  } else {
    header("Location: /entrar");
  }
}

if($method == "GET") {
  include_once __DIR__."/../../visualization/pages/login.php";
}