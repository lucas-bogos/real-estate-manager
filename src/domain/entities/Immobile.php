<?php

declare(strict_types=1);

namespace source\domain\entities;

use source\domain\valueObjects\immobile\Address;
use source\domain\valueObjects\immobile\Room;
use source\domain\valueObjects\immobile\Value;

class Immobile 
{
  protected string $imageImmobile;
  protected Value $value;
  protected Address $address;
  protected Room $room;

  public function setImageImmobile(string $imageImmobile): self
  {
    $this->imageImmobile = $imageImmobile;
    return $this;
  }

  public function getImageImmobile(): string
  {
    return $this->imageImmobile;
  }

  public function setValue(Value $value): self 
  {
    $this->value = $value;
    return $this;
  }
  
  public function getValue(): Value 
  {
    return $this->value;
  }

  public function setAddress(Address $address): self
  {
    $this->address = $address;
    return $this;
  }

  public function getAddress(): Address
  {
    return $this->address;
  }

  public function setRoom(Room $room): self
  {
    $this->room = $room;
    return $this;
  }

  public function getRoom(): Room
  {
    return $this->room;
  }

  public function __toString(): string
  {
    $immobile = $this->address.",".$this->value.",".$this->room;
    return $immobile;
  }
}