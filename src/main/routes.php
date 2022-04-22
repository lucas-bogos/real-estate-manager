<?php

declare(strict_types=1);

use source\application\Auth;
use source\shared\core\base\Controller;

$url = $_SERVER["REQUEST_URI"];

$hasExtensionPhp = str_contains($url, ".php");

if(! $hasExtensionPhp) {
  switch($url) {
    case "/":
      Auth::verifySession();
      Controller::handle("indexController");
      break;
    case "/entrar":
      Controller::handle("signInController");
      break;
    case "/registrar":
      Controller::handle("registerController");
      break;
    case "/imoveis/casas":
      Auth::verifySession();
      Controller::handle("housesController");
      break;
    case "/imoveis/apartamentos":
      Auth::verifySession();
      Controller::handle("apartamentsController");
      break;
    case "/nada-encontrado":
      include_once getcwd()."/404.php";
      break;
    case "/log-out":
      session_start();
      unset($_SESSION["user_logged"]);
      header("Location: /entrar");
      break;
    case "/painel/adicionar":
      Auth::verifySession();
      Controller::handle("painelController");
      break;
    default:
      header("Location: /nada-encontrado");
      break;
  }
}