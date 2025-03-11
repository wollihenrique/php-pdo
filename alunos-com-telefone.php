<?php

require 'vendor/autoload.php';

use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infraestructure\Repository\PdoStudentsRepository;

$connection = ConnectionCreator::createConnection();
/**
 * @var \Alura\Pdo\Domain\Model\Student[] $studentList
 */
$pdo = new PdoStudentsRepository($connection);
$StudentsWithPhones= $pdo->studentsWithPhones();
var_dump($StudentsWithPhones);

echo $StudentsWithPhones[1]->phones()[1]->formattedPhone();