<?php

declare(strict_types=1);

namespace source\domain\valueObjects\immobile;

use DomainException;

final class Value 
{
  private int $value;

  public function __construct(int $value)
  {
    if($value < 0) {
      throw new DomainException("The value cannot be negative");
    }
    $this->value = $value;
  }

  public function __toString(): string
  {
    return (string)$this->value;
  }
}