<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$student = new Student(null, 'Vinicius Dias', new \DateTimeImmutable('1997-10-15'));

$sqlInsert = "
    INSERT INTO students (name, birth_data) 
    VALUES('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}')
";

echo $sqlInsert;

// se exec retornar 1 (inteiro) funcionou
// caso o exec for utilizado para uma consulta, ele retorna a qtd de registros da consulta
$pdf->exec($sqlInsert);


