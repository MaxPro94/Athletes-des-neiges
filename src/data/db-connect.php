<?php

$host = 'localhost';
$dbName = 'athletes';
$user = 'root';
$pwd = '';

try {
    $dbh = new PDO("mysql: host=$host; dbName=$dbName", $user, $pwd, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    echo 'Error : ' . $e->getMessage();
}
