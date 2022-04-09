<!DOCTYPE HTML>
<html>

<head>
    <style>
        body {

            font-size: 2rem;
        }
    </style>
</head>

<?php
$errors = [];
$olddata = [];
//first name validation
if (empty($_POST['fname']) or $_POST['fname'] == '') {
    $errors['fname'] = 'Please enter your first name';
} else {
    $name = $_POST['fname'];
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $errors['fname'] = 'Only letters and white space allowed';
    } else {
        $olddata['fname'] = $name;
    }
}
//last name validation
if (empty($_POST['lname']) or $_POST['lname'] == '') {
    $errors['lname'] = 'Please enter your last name';
} else {
    $lastName =  $_POST['lname'];
    if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
        $errors['lname'] = 'Only letters and white space allowed';
    } else {
        $olddata['lname'] = $lastName;
    }
}
//address validation
if (empty($_POST['address']) or $_POST['address'] == '') {
    $errors['address'] = 'Please enter your address';
} else {
    $olddata['address'] = test_input($_POST['address']);
}

//email validation
if (empty($_POST['email']) or $_POST['email'] == '') {
    $errors['email'] = 'Please enter your email';
} else {
    $email = test_input($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email';
    } else {
        $olddata['email'] = $email;
    }

    //2nd solution
    // $errors['email'] =  validateEmail($_POST['email']);
}
//password validation
if (empty($_POST['password']) or $_POST['password'] == '' or strlen($_POST['password']) < 8) {
    $errors['password'] = 'Please enter a correct password';
} else {
    $olddata['password'] = test_input($_POST['password']);
}
//confirm password validation
if (empty($_POST['cpassword']) or $_POST['cpassword'] == '' or $_POST['cpassword'] != $_POST['password']) {
    $errors['cpassword'] = 'Please enter your password again';
} else {
    $olddata['cpassword'] = test_input($_POST['cpassword']);
}
//functions 
function validateEmail($email)
{
    $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
    return preg_match($regex, $email) ? "The email is valid" . "<br>" : "The email is not valid";
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




if (count($errors) > 0) {
    $err = json_encode($errors);
    var_dump($err);

    if (count($olddata) > 0) {
        var_dump($old);
        $old = json_encode($olddata);
        header("Location:htmlForm.php?errors={$err}&old={$old}");
    } else {
        header("Location:htmlForm.php?errors={$err}");
    }
} else {

    $dbConnection = require 'dbConnection.php';
    ################ insert ####################################
    $insert_query = "insert into task4(`fname`, `lname` , `address` , `gender` , `email`, `password`) values(?,?,?,?,?,?)";
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);


    $insert_query = $db->prepare($insert_query);
    $insert_query->bindParam(1, $name);
    $insert_query->bindParam(2, $lname);
    $insert_query->bindParam(3, $address);
    $insert_query->bindParam(4, $gender);
    $insert_query->bindParam(5, $email);
    $insert_query->bindParam(6, $password);
    $insert_query->execute();
    header("Location:allusers.php");
}

?>