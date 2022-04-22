<?php

declare(strict_types=1);

namespace source\domain\valueObjects\apartament;

use DomainException;

final class Condominium 
{
  private int $condominium;

  public function __construct(int $condominium)
  {
    if($condominium < 0) {
      throw new DomainException("The value cannot be negative");
    }
    $this->condominium = $condominium;
  }

  public function __toString(): string
  {
    return (string)$this->condominium;
  }
}