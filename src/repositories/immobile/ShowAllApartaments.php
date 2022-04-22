<?php

declare(strict_types=1);

namespace source\repositories\immobile;

use PDO;
use source\shared\infra\ConnectionPDO;

class ShowAllApartaments {
  public static function get(): array
  {
    // incializa o banco de dados
    $pdo = ConnectionPDO::init(); 

    // executa uma query de seleção no banco
    $res = $pdo->query("SELECT address, value, room, imageImmobile, apartament.condominium FROM immobile JOIN apartament WHERE apartament.ApartamentID=immobile.ApartamentID")
      ->fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }
}