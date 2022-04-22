<?php

declare(strict_types=1);

namespace source\domain\valueObjects\house;

use DomainException;

final class Backyard 
{
  private bool $backyard;

  public function __construct(bool $backyard)
  {
    $this->backyard = $backyard;
  }

  public function __toString(): string
  {
    return (string)$this->backyard;
  }
}