<?php 

use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;

require './vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

var_dump(
    $pdo->exec(statement: 
        "INSERT INTO phones
        (area_code, number, student_id) 
        VALUES 
        ('24', '777777777', 7),
        ('21', '888888888', 7);
    ")
);

echo $pdo->lastInsertId();
// $createTableSql = '
//     CREATE TABLE IF NOT EXISTS students (
//         id INTEGER PRIMARY KEY,
//         name TEXT,
//         birth_date TEXT
//     ); 
//     CREATE TABLE IF NOT EXISTS phones (
//         id INTEGER PRIMARY KEY,
//         area_code TEXT,
//         number TEXT,
//         student_id INTEGER,
//         FOREIGN KEY (student_id) REFERENCES students(id)
//     );
// ';

// $pdo->exec($createTableSql);
// echo "Conectei";