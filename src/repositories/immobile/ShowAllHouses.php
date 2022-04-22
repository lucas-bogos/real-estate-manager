<?php

declare(strict_types=1);

namespace source\repositories\immobile;

use PDO;
use source\shared\infra\ConnectionPDO;

class ShowAllHouses {
  public static function get(): array
  {
    // incializa o banco de dados
    $pdo = ConnectionPDO::init(); 

    // executa uma query de seleção no banco
    $res = $pdo->query("SELECT address, value, room, imageImmobile, house.backyard FROM immobile JOIN house WHERE house.HouseID=immobile.HouseID")
      ->fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }
}