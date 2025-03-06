<?php

require './vendor/autoload.php';

use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$query = "DELETE FROM students WHERE id = ?;";
$preparedStatement = $pdo->query($query);
$preparedStatement->bindValue(1, 5, PDO::PARAM_INT);
var_dump($preparedStatement->execute());

?>