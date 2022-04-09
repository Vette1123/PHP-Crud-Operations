<?php

if (isset($_GET['errors'])) {
    $errors = json_decode($_GET['errors']);
}
if (isset($_GET['old'])) {
    $old = json_decode($_GET['old']);
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
            font-size: 1rem;
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
            margin: 4px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            height: 1rem;
            font-size: 1rem;
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
    <form method="post" action="submit.php" enctype="multipart/form-data">
        <label for="fname">First Name</label>
        </br>
        <input type="text" name="fname" value="<?php if (isset($old->fname)) {
                                                    echo $old->fname;
                                                }  ?>">
        <?php
        if (isset($errors->fname)) {
            echo "<p style='color: red'> $errors->fname</p>";
        }
        ?>
        <label for="lname">Last Name</label>
        </br>
        <input type="text" name="lname" value="<?php if (isset($old->lname)) {
                                                    echo $old->lname;
                                                } ?>">
        <?php
        if (isset($errors->lname)) {
            echo "<p style='color: red'> $errors->lname</p>";
        }
        ?>
        <label for="address">Address</label>
        </br>
        <input type="text" name="address" value="<?php if (isset($old->address)) {
                                                        echo $old->address;
                                                    }  ?>"></input>
        <?php
        if (isset($errors->address)) {
            echo "<p style='color: red'> $errors->address</p>";
        }
        ?>
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

        </br><br>
        <label for="email">Email</label>
        </br>
        <input type="text" name="email" value="<?php if (isset($old->email)) {
                                                    echo $old->email;
                                                } ?>">
        <?php
        if (isset($errors->email)) {
            echo "<p style='color: red'> $errors->email</p>";
        }
        ?>
        <label for="password">Password</label>
        </br>
        <input type="password" name="password" value="<?php if (isset($old->password)) {
                                                            echo $old->password;
                                                        } ?>">
        <?php
        if (isset($errors->password)) {
            echo "<p style='color: red'> $errors->password</p>";
        }
        ?>
        <label for="cpassword">Confirm Password</label>
        </br>
        <input type="password" name="cpassword" value="<?php if (isset($old->cpassword)) {
                                                            echo $old->cpassword;
                                                        } ?>">
        <?php
        if (isset($errors->cpassword)) {
            echo "<p style='color: red'> $errors->cpassword</p>";
        }
        ?>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>