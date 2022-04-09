<?php
try {
    //db connection
    $dbConnection = require 'dbConnection.php';
    $select_query = "select * from `task4`";
    $stmt = $db->prepare($select_query);
    $res = $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

    echo "<table border='2px'> <th>ID</th>
                <th>First Name</th>  <th>Last Name</th>  <th>Address</th>   <th>Gender</th>  <th>Email</th> <th>Password</th> <th>View</th> <th>Edit</th> <th>Delete</th>";

    foreach ($rows as $r) {
        echo "<tr> <td>$r->ID</td>  <td>$r->fname</td> <td>$r->lname</td> <td>$r->address</td> <td>$r->gender</td> <td>$r->email</td> <td>$r->password</td> ";
        echo "<td> <a href='viewUser.php?id={$r->ID}'> View</a> </td>
                <td> <a href='edit.php?id={$r->ID}'> Edit</a> </td>
                <td> <a href='deleteUser.php?id={$r->ID}'> Delete</a> </td>";
        echo "</tr>";
    }
    echo "</table>";
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>