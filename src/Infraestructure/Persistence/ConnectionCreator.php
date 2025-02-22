<?php

namespace Alura\Pdo\Infraestructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO     
    {
        $databasePath = __DIR__ . '/../../../banco.sqlite';
        return $pdo = new PDO (dsn: 'sqlite:' . $databasePath);
    }
}

?>