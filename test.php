<?php


use Alura\Pdo\Infraestructure\Repository\PdoStudentsRepository;


$pdo = new PDO('...');
$test = new PdoStudentsRepository($pdo);

empty($test->allStudents());