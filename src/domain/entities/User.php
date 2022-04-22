<?php

declare(strict_types=1);

namespace source\domain\entities;

use source\domain\valueObjects\user\Email;
use source\domain\valueObjects\user\Name;
use source\domain\valueObjects\user\Password;

class User {
  private Name $name;
  private Email $email;
  private Password $password;

  public function setName(Name $name): self
  {
    $this->name = $name;
    return $this;
  }

  public function getName(): Name
  {
    return $this->name;
  }

  public function setEmail(Email $email): self
  {
    $this->email = $email;
    return $this;
  }

  public function getEmail(): Email
  {
    return $this->email;
  }

  public function setPassword(Password $password): self
  {
    $this->password = $password;
    return $this;
  }

  public function getPassword(): Password
  {
    return $this->password;
  }
}