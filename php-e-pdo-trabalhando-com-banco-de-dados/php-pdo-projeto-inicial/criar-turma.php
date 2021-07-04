<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;
use Alura\Pdo\Domain\Model\Student;

// use Exception;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

// criar turma
// inserir alunos da turma

// iniciando transacao
$connection->beginTransaction();

try {
    $student1 = new Student(
        null,
        'Nico',
        new DateTimeImmutable('1985-01-01')
    );

    $studentRepository->save($student1);

    $student2 = new Student(
        null,
        'Rodrigo',
        new DateTimeImmutable('1995-01-01')
    );

    $studentRepository->save($student2);

    // comitando transacao
    $connection->commit();
} catch (\Exception $e) {
    echo $e->getMessage();
    // echo $e->errorInfor[1];
    
    // cancelando e desfazendo a transacao
    $connection->rollBack();
}



