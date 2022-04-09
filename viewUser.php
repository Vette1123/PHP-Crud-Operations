<?php
try {
    //db connection
    $userID = $_GET['id'];
    $dbConnection = require 'dbConnection.php';
    $select_query = "select * from `task4` where `ID` = $userID ";
    $stmt = $db->prepare($select_query);
    $res = $stmt->execute();
    // var_dump($res);
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            background-color: #826F66;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
            background-color: #fff;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover,
        a:hover {
            opacity: 0.7;
        }
    </style>
</head>

<body>
    <h2 style="text-align:center; font-size: 5rem;">User Profile Card</h2>

    <div class="card">
        <img src="https://images.unsplash.com/photo-1649239085201-5a6d724fd6af?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="John" style="width:100%">
        <h1><?php echo $rows[0]->fname . " " . $rows[0]->lname ?></h1>
        <p class="title"><?php echo $rows[0]->address ?></p>
        <p class="title"><?php echo $rows[0]->gender ?></p>
        <p><?php echo $rows[0]->email ?></p>
        <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
        </div>
        <p><button>Contact</button></p>
    </div>
</body>