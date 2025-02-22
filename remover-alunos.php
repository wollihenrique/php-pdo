<?php

require './vendor/autoload.php';

use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$query = "DELETE FROM students WHERE id = ?;";
$preparedStatement = $pdo->query($query);
$preparedStatement->bindValue(1, 9, PDO::PARAM_INT);
var_dump($preparedStatement->execute());

?>