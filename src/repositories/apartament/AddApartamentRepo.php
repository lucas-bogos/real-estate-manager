<?php

declare(strict_types=1);

namespace source\repositories\apartament;

use source\domain\entities\Apartament;
use source\domain\valueObjects\apartament\Condominium;
use source\domain\valueObjects\immobile\Address;
use source\domain\valueObjects\immobile\Room;
use source\domain\valueObjects\immobile\Value;
use source\shared\infra\ConnectionPDO;

class AddApartamentRepo 
{
  public static function save(
    int $condominium,
    string $imageImmobile,
    int $value,
    string $address,
    int $room
  )
  {
     // cria uma instancia de um apartamento
    $apartament = new Apartament();

    // define e valida os dados
    $apartament
      ->setCondominium(new Condominium($condominium))
      ->setImageImmobile($imageImmobile)
      ->setValue(new Value($value))
      ->setAddress(new Address($address))
      ->setRoom(new Room($room));

    // incializa o banco de dados
    $pdo = ConnectionPDO::init(); 

    // insere o valor do condomínio no banco de dados
    $queryApartament = "INSERT INTO apartament(condominium) VALUES(?)";
    $addApartament = $pdo->prepare($queryApartament);
    $addApartament->execute([0 => $apartament->getCondominium()]);
    $idApartament = $pdo->lastInsertId();

    // insere o novo imóvel
    $queryImmobile = "INSERT INTO immobile(value, address, room, ApartamentID, imageImmobile) VALUES(?, ?, ?, ?, ?)";
    $addImmobile = $pdo->prepare($queryImmobile);
    $addImmobile->execute([
      0 => $apartament->getValue(),
      1 => $apartament->getAddress(),
      2 => $apartament->getRoom(),
      3 => $idApartament,
      4 => $apartament->getImageImmobile()
    ]);
  }
}