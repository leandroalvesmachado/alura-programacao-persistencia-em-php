<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$student = new Student(
    null,
    'Vinicius Dias 2',
    new \DateTimeImmutable('1997-10-15')
);

// $sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";
// echo $sqlInsert;

// se exec retornar 1 (inteiro) funcionou
// caso o exec for utilizado para uma consulta, ele retorna a qtd de registros da consulta
// var_dump($pdo->exec($sqlInsert));

// criando insert mais seguro
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));

echo $sqlInsert;

if ($statement->execute()) {
    echo 'Aluno salvo';
}



exit();



