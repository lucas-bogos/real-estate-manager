<?php

declare(strict_types=1);

namespace source\shared\infra;

use PDO;
use PDOException;
use Exception;

final class ConnectionPDO
{
  public static function init(): PDO
  {
    try {
      $pdo = new PDO(DRIVER.":host=".DBHOST.";dbname=".DBNAME, DBUSER, PASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $error) {
        die("Erro de conexão do PDO: ".$error->getMessage());
    } catch (Exception $error) {
        die("Ocorreu um erro: ".$error->getMessage());
    }
  }
}