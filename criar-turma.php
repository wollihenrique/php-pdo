<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infraestructure\Repository\PdoStudentsRepository;
use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentsRepository($connection);

$connection->beginTransaction();

$studentA = new Student(
    null,
    'Porco Galliard',
    new DateTimeImmutable('2003-04-12')
);

$studentRepository->save($studentA);

$studentB = new Student(
    null,
    'Eren Jaeger',
    new DateTimeImmutable('1997-12-01')
);

$studentRepository->save($studentB);

$connection->rollBack();