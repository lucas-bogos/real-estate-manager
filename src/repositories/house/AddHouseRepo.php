<?php

declare(strict_types=1);

namespace source\repositories\house;

use source\domain\entities\House;
use source\domain\valueObjects\house\Backyard;
use source\domain\valueObjects\immobile\Address;
use source\domain\valueObjects\immobile\Room;
use source\domain\valueObjects\immobile\Value;
use source\shared\infra\ConnectionPDO;

class AddHouseRepo 
{
  public static function save(
    bool $backyard,
    string $imageImmobile,
    int $value,
    string $address,
    int $room
  )
  {
    // cria uma instancia de uma casa
    $house = new House();

    // define e valida os dados
    $house
      ->setBackyard(new Backyard($backyard))
      ->setImageImmobile($imageImmobile)
      ->setValue(new Value($value))
      ->setAddress(new Address($address))
      ->setRoom(new Room($room));

    // incializa o banco de dados
    $pdo = ConnectionPDO::init(); 

    // formata previamente para ser inserido no banco
    $backyardFormated = $house->getBackyard() === true ? 1 : 0;

    // insere se tem ou não quintal na casa
    $addHouse = $pdo->prepare("INSERT INTO house(backyard) VALUES(?)");
    $addHouse->execute([0 => $backyardFormated]);
    $idHouse = $pdo->lastInsertId();

    // insere o novo imóvel
    $queryImmobile = "INSERT INTO immobile(value, address, room, HouseID, imageImmobile) VALUES(?, ?, ?, ?, ?)";
    $addImmobile = $pdo->prepare($queryImmobile);
    $addImmobile->execute([
      0 => $house->getValue(),
      1 => $house->getAddress(),
      2 => $house->getRoom(),
      3 => $idHouse,
      4 => $house->getImageImmobile()
    ]);
  }
}