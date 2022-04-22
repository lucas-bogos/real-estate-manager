<?php

declare(strict_types=1);

namespace source\domain\valueObjects\user;

use DomainException;

final class Password 
{
  private string $password;

  public function __construct(string $password)
  {
    if(strlen($password) < 8) {
      throw new DomainException("Password must be larger or equal than 8 chars");
    }
    $this->password = $password;
  }

  public function __toString(): string
  {
    return $this->password;
  }
}