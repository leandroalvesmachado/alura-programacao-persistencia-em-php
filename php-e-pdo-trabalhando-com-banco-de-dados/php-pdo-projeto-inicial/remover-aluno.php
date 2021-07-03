<?php

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$preparedStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
// por padrao o tipo PARAM_STR (string)
$preparedStatement->bindValue(1, 4, PDO::PARAM_INT);

var_dump($preparedStatement->execute());

// pode reutilizar o preparedStatement, passando novos valores
// $preparedStatement->bindValue(1, 5, PDO::PARAM_INT);
// $preparedStatement->execute();
