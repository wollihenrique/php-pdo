<?php

namespace Alura\Pdo\Infraestructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO     
    {
        $databasePath = __DIR__ . '/../../../banco.sqlite';
        $connection = new PDO (dsn: 'sqlite:' . $databasePath);
        //$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    }
}

?>