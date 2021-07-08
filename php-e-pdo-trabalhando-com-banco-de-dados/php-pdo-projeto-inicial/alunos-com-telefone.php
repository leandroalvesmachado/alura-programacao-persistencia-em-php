<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();

$repository = new PdoStudentRepository($connection);
$studentList = $repository->studentsWithPhones();

var_dump($studentList);

/** @var Alura\Pdo\Domain\Model\Student[] $studentList */
// (24) 9999999999
echo $studentList[1]->phones()[0]->formattedPhone();