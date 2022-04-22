<?php

declare(strict_types=1);

namespace source\domain\entities;

use source\domain\entities\Immobile;
use source\domain\valueObjects\house\Backyard;

class House extends Immobile 
{
  private Backyard $backyard;

  public function setBackyard(Backyard $backyard): self
  {
    $this->backyard = $backyard;
    return $this;
  }

  public function getBackyard(): Backyard
  {
    return $this->backyard;
  }

  public function __toString(): string
  {
    $backyard = (string)$this->getBackyard();
    $immobile = $this->address.",".$this->value.",".$this->room;
    return $immobile.",".$backyard;
  }
}