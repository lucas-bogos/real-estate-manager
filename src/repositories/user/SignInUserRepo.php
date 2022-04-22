<?php

declare(strict_types=1);

namespace source\repositories\user;

use source\domain\entities\User;
use source\domain\valueObjects\user\Email;
use source\domain\valueObjects\user\Password;

use source\shared\infra\ConnectionPDO;

// iniciar uma seção
session_start();

class SignInUserRepo
{
  public static function login(string $email, string $password): bool
  {
    // cria um novo usuário
    $user = new User();
    
    // define e valida os dados
    $user
      ->setEmail(new Email($email))
      ->setPassword(new Password($password));

    // incializa o banco de dados
    $pdo = ConnectionPDO::init();
    $query = "SELECT name, password FROM user WHERE password = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([0 => $user->getPassword()]);
    $rows = $stmt->fetchAll();

    if (!$rows > 0) {
      echo 'Usuário não existe, <a href="/registrar">fazer cadastro?</a>';
      return false;
    } else {
      $_SESSION["user_logged"] = $rows[0]["name"];
      return true;
    }
  }
}
