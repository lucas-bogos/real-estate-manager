<?php

declare(strict_types=1);

namespace source\shared\core\base;

class Controller 
{
  public static function handle(string $controller): void
  {
    include_once __DIR__."/../../../adapter/controllers/$controller.php";
  }
}