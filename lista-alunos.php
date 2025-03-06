<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infraestructure\Repository\PdoStudentsRepository;

require 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$repository = new PdoStudentsRepository($pdo);
$studentList = $repository->allStudents();

var_dump($studentList);

// while ($studentData = $statement->fetch(PDO::FETCH_ASSOC)) {
//     $student = new Student(
//         $studentData['id'],
//         $studentData['name'],
//         new DateTimeImmutable($studentData['birth_date'])
//     );

//     echo $student->age() . PHP_EOL;
// }
// exit();

// foreach($studentDataList as $studentData) {
//     $studentList[] = new Student(
//         $studentData['id'], 
//         $studentData['name'], 
//         new DateTimeImmutable($studentData['birth_date'])
//     );
// }

