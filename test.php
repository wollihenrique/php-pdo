<?php

use Alura\Pdo\Infraestructure\Repository\PdoStudentsRepository;
use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;

require 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
// $test = new PdoStudentsRepository($pdo);

// empty($test->allStudents());

$sqlCheck = "
    SELECT s.id AS student_id, p.student_id
    FROM students s
    LEFT JOIN phones p ON s.id = p.student_id
    LIMIT 5
";
$stmt = $pdo->prepare($sqlCheck);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);