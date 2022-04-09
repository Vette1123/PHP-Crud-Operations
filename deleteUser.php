<?php
$userID = $_GET['id'];
try {
    //code...
    $dbConnection = require 'dbConnection.php';
    $deleteQuery = 'delete from `task4` where `ID` =:stdid';
    $del_stmt = $db->prepare($deleteQuery);
    $del_stmt->bindParam(':stdid', $userID);
    $res = $del_stmt->execute();
    header("Location: allusers.php");
} catch (Exception $e) {

    echo $e->getMessage();
}
