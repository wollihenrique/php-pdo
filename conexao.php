<?php 

use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

echo "Conectei";
//$pdo->exec('CREATE TABLE Students ( id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT );');
// $pdo->exec('DROP TABLE Students;');