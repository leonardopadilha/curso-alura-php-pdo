<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConectionCreator::createConnection();

//$student = new Student(null, 'Vinicius Dias', new \DateTimeImmutable('1997-10-15'));

/* $student = new Student(
    null, 
    "Vinicius', ''); DROP TABLE students; --Dias ",
    new \DateTimeImmutable('1997-10-15')
); */

$student = new Student(
    null, 
    "Patrícia Freitas",
    new \DateTimeImmutable('1986-10-25')
);

//$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";

//echo $sqlInsert;

//var_dump($pdo->exec($sqlInsert));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
$statement->execute();

if ($statement->execute()) {
    echo "Aluno incluído";
};