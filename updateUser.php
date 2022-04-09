<?php
$userID = $_GET['id'];
try {
    //code...
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $dbConnection = require 'dbConnection.php';
    // $updateStm = "update `task4` set `fname`='$fname',`lname`=$lname,`address`=$address,`gender`=$gender,`email`=$email,`password`=$password where `ID` = $userID";
    $updateStm = "update `task4` set `fname`= ?,`lname`=?,`address`=?,`gender`=?,`email`=?,`password`=? where `ID`=$userID";
    $prepareStm = $db->prepare($updateStm);
    $res = $prepareStm->execute([$fname, $lname, $address, $gender, $email, md5($password)]);
    header("Location: allusers.php");
} catch (Exception $e) {

    echo $e->getMessage();
}
