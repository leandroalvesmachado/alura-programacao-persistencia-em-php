<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$student1 = new Student(
    null,
    'Vinicius Dias',
    new \DateTimeImmutable('1997-10-15')
);

$student2 = new Student(
    null,
    'Estudante 2',
    new \DateTimeImmutable('1999-10-25')
);

$student3 = new Student(
    null,
    'Estudante 3',
    new \DateTimeImmutable('2020-10-25')
);

// $sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";
// echo $sqlInsert;

// se exec retornar 1 (inteiro) funcionou
// caso o exec for utilizado para uma consulta, ele retorna a qtd de registros da consulta
// var_dump($pdo->exec($sqlInsert));

// criando insert mais seguro
// bindValue
$sqlInsert1 = "INSERT INTO students (name, birth_date) VALUES (?, ?);";
$statement1 = $pdo->prepare($sqlInsert1);
$statement1->bindValue(1, $student1->name());
$statement1->bindValue(2, $student1->birthDate()->format('Y-m-d'));

$sqlInsert2 = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
$statement2 = $pdo->prepare($sqlInsert2);
$statement2->bindValue(':name', $student2->name());
$statement2->bindValue(':birth_date', $student2->birthDate()->format('Y-m-d'));

// criando insert mais seguro
// bindParam (passa o valor por referencia, o endereco da variavel)
$name = $student3->name();
$sqlInsert3 = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
$statement3 = $pdo->prepare($sqlInsert3);
$statement3->bindParam(':name', $name);
$statement3->bindValue(':birth_date', $student3->birthDate()->format('Y-m-d'));

echo $sqlInsert1;
echo $sqlInsert2;
echo $sqlInsert3;

if ($statement1->execute()) {
    echo 'Aluno salvo';
}

if ($statement2->execute()) {
    echo 'Aluno salvo';
}

if ($statement3->execute()) {
    echo 'Aluno salvo';
}



exit();



