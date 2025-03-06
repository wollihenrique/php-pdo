<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;

require './vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$student = new Student(null, "Miguel Morgado", new DateTimeImmutable('2010-03-03'));
$nome = $student->name();
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindParam(':name', $nome);   /*bindParam() SEMPRE SERÁ PASSADO POR REFERÊNCIA*/ 
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));


if($statement->execute()){
    echo "Aluno Incluído!";
}
