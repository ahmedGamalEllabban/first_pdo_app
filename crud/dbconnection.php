<?php

$dsn = 'mysql:host=localhost;dbname=project';
$user = 'root';
$pass = '';

try {
    $connect = new PDO($dsn, $user, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection Failed' . $e->getMessage();
}
