<?php

declare(strict_types=1);

namespace source\domain\entities;

use source\domain\entities\Immobile;
use source\domain\valueObjects\apartament\Condominium;

final class Apartament extends Immobile 
{
  private Condominium $condominium;

  public function setCondominium(Condominium $condominium): self
  {
    $this->condominium = $condominium;
    return $this;
  }

  public function getCondominium(): Condominium
  {
    return $this->condominium;
  }

  public function __toString(): string
  {
    $immobile = $this->address.",".$this->value.",".$this->room;
    $ap = (string)$this->condominium;
    return $immobile.",".$ap;
  }
}