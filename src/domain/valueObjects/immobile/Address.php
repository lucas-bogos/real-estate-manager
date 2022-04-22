<?php

declare(strict_types=1);

namespace source\domain\valueObjects\immobile;

use DomainException;

final class Address 
{
  private string $address;

  public function __construct(string $address)
  {
    if(strlen($address) > 100) {
      throw new DomainException("The value is greater than you can add");
    }
    $this->address = $address;
  }

  public function __toString(): string
  {
    return $this->address;
  }
}