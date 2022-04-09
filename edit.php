<?php
$userID = $_GET['id'];
try {
    //code...
    $dbConnection = require 'dbConnection.php';
    $selectStm = "select * from `task4` where `ID` = $userID";
    $updateStm = $db->prepare($selectStm);
    $res = $updateStm->execute();
    $rows = $updateStm->fetchAll(PDO::FETCH_OBJ);
    // header("Location: allusers.php");
} catch (Exception $e) {

    echo $e->getMessage();
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <style>
        body {
            background-color: #826F66;
        }

        form {
            margin: 5rem auto 0;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: #f2f2f2;
            box-shadow: 0 0 20px 0 #ccc;
            font-size: 2rem;
            max-width: 600px;
        }

        label {
            display: inline-block;
            margin-bottom: 5px;
        }

        input[type=text],
        input[type=password],
        input[type=email],
        input[type=number] {
            width: 100%;
            padding: 12px 20px;
            margin: 0.5rem 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            height: 2rem;
            font-size: 1.5rem;
        }

        input[type=file] {
            margin: 0.25rem 4rem;
        }


        textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 4px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            height: 1rem;
            font-size: 1rem;
        }

        select {
            width: 100%;
            padding: 12px 20px;
            margin: 4px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1rem;
        }

        .checkboxStyle {
            margin: auto;
            padding: 10px 15px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #F6E7D8;
        }

        .flexGender {
            display: flex;
            flex-direction: column;
            margin: 2rem auto;
            padding: 10px 15px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #F6E7D8;
            width: 5rem;
        }

        .flexGenderParent {
            display: flex;
            align-items: center;
        }

        input[type=submit],
        input[type=reset] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form method="post" action=<?php echo "updateUser?id=" . $rows[0]->ID; ?>>
        <label for="fname">First Name</label>
        </br>
        <input type="text" name="fname" value="<?php echo $rows[0]->fname ?>">
        <label for="lname">Last Name</label>
        </br>
        <input type="text" name="lname" value="<?php echo $rows[0]->lname ?>">
        <label for="address">Address</label>
        </br>
        <input type="text" name="address" value="<?php echo $rows[0]->address ?>"></input>
        <div class="flexGenderParent">
            <div>
                <label for="gender">Gender: </label>
            </div>
            <div class="flexGender">
                <div>
                    <input type="radio" checked value="male" name="gender" id="male">
                    <label for="male">Male</label>
                </div>
                <div>
                    <input type="radio" value="female" name="gender" id="female">
                    <label for="female">Female</label>
                </div>
            </div>
        </div>
        <label for="email">Email</label>

        <input type="text" name="email" value="<?php echo $rows[0]->email ?>">
        <label for="password">Password</label>
        </br>
        <input type="password" name="password" value="<?php echo $rows[0]->password ?>">
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>