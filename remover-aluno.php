<?php

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConectionCreator::createConnection();

$preparedStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
$preparedStatement->bindValue(1, 4, PDO::PARAM_INT);
var_dump($preparedStatement->execute());

$preparedStatement->bindValue(1, 3, PDO::PARAM_INT);
var_dump($preparedStatement->execute());