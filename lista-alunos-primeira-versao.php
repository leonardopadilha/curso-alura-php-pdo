<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$statement = $pdo->query('SELECT * FROM students;');
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);

$studentList = [];

foreach ($studentDataList as $studentData) {
    $studentList[] = new Student(
                            $studentData['id'], 
                            $studentData['name'], 
                            new \DateTimeImmutable($studentData['birth_date'])
                        );
};

var_dump($studentList);

//echo $studentList[0]['name'];

//echo PHP_EOL;

/*
while ($studentData = $statement->fetch(PDO::FETCH_ASSOC)) {
    $student = new Student(
        $studentData['id'], 
        $studentData['name'], 
        new \DateTimeImmutable($studentData['birth_date'])
    );

    echo $student->age() . PHP_EOL;
};

exit();
*/
