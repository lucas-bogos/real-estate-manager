<?php

declare(strict_types=1);

namespace source\repositories\user;

use source\domain\entities\User;
use source\domain\valueObjects\user\Email;
use source\domain\valueObjects\user\Name;
use source\domain\valueObjects\user\Password;
use source\shared\infra\ConnectionPDO;

class RegisterUserRepo 
{
  public static function save(string $name, string $email, string $password): bool 
  {
    // cria um novo usuário
    $user = new User();

    // define e valida os dados
    $user
      ->setName(new Name($name))
      ->setEmail(new Email($email))
      ->setPassword(new Password($password));

    $pdo = ConnectionPDO::init();
    $query = "INSERT INTO user(name, email, password) VALUES(?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
      0 => $user->getName(),
      1 => $user->getEmail(),
      2 => $user->getPassword()
    ]);
    return true;
  }
}