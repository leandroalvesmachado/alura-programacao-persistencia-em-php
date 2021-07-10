<?php

$caminhoBanco = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $caminhoBanco);

echo 'Conectado';

$pdo->exec(
    "INSERT INTO phones (area_code, number, student_id) VALUES ('24', '999999999', 1), ('85', '888888888', 1)"
);

exit();

// sqlite
$pdo->exec('
    CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY,
        name TEXT,
        birth_date TEXT
    );

    CREATE TABLE IF NOT EXISTS phones (
        id INTEGER PRIMARY KEY,
        area_code TEXT,
        number TEXT,
        student_id INTEGER,
        FOREIGN KEY(student_id) REFERENCES students (id)
    );
');

// mysql
// $pdo->exec('
//     CREATE TABLE IF NOT EXISTS students (
//         id INTEGER PRIMARY KEY AUTO_INCREMENT,
//         name VARCHAR(128),
//         birth_date DATE
//     );

//     CREATE TABLE IF NOT EXISTS phones (
//         id INTEGER PRIMARY KEY AUTO_INCREMENT,
//         area_code CHAR(2),
//         number CHAR(9),
//         student_id INTEGER,
//         FOREIGN KEY(student_id) REFERENCES students (id)
//     );
// ');