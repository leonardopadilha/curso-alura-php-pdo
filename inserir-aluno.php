<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

//$student = new Student(null, 'Vinicius Dias', new \DateTimeImmutable('1997-10-15'));

$student = new Student(
    null, 
    "Vinicius', ''); DROP TABLE students; --Dias ",
    new \DateTimeImmutable('1997-10-15')
);

//$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";

//echo $sqlInsert;

//var_dump($pdo->exec($sqlInsert));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?);";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));
$statement->execute();

if ($statement->execute()) {
    echo "Aluno incluído";
};