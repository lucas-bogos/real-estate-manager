<?php

declare(strict_types=1);

namespace source\domain\valueObjects\immobile;

use DomainException;

final class Room 
{
  private int $room;

  public function __construct(int $room)
  {
    if($room < 0) {
      throw new DomainException("The value cannot be negative");
    }
    $this->room = $room;
  }

  public function __toString(): string
  {
    return (string)$this->room;
  }
}