<?php
$dsn = 'mysql:dbname=testing;host=localhost;port=3306;'; #port number
$user = 'root';
$password = 'Awad36148';

try {
    //code...
    $db = new PDO($dsn, $user, $password);
    $table = "task4";

    $sql = "CREATE table IF NOT EXISTS $table(
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR( 50 ) NOT NULL, 
    lname VARCHAR( 250 ) NOT NULL,
    address VARCHAR( 150 ) NOT NULL, 
    gender VARCHAR( 150 ) NOT NULL, 
    email VARCHAR( 150 ) NOT NULL, 
    password VARCHAR( 100 ) NOT NULL);";
    $db->exec($sql);
} catch (PDOException $e) {
    $e->getMessage();
}
