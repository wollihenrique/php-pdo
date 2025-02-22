<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;

require './vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$statement = $pdo->query('SELECT * FROM students;');
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];


// while ($studentData = $statement->fetch(PDO::FETCH_ASSOC)) {
//     $student = new Student(
//         $studentData['id'],
//         $studentData['name'],
//         new DateTimeImmutable($studentData['birth_date'])
//     );

//     echo $student->age() . PHP_EOL;
// }
// exit();

foreach($studentDataList as $studentData) {
    $studentList[] = new Student(
        $studentData['id'], 
        $studentData['name'], 
        new DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList);