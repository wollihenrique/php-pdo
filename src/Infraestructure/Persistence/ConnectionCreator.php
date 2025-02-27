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
        //está comentado porque atualmente já é o padrão do php lançar essas PDO::Exceptions
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}

?>