<?php
session_start();
require 'db.php';
$query = "SELECT * FROM user ";
$result = $con->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
        }
        th, td{
            border: 2px solid black;
            padding: 8px;
            text-align: center;
        }
        th{
            background-color:rgb(73, 134, 226);
        }
        button{
            margin-top: 20px;
            margin-right:5%;            
            padding: 10px;
            background-color: rgb(98, 164, 250);
            border: 1px solid black;
            border-radius: 8px;
            cursor: pointer;
        }
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
<table border="2" style="width: 100%;">
    <tr style="background-color: #f2f2f2;">
        <th>id</th>
        <th>name</th>
        <th>phone</th>
        <th>email</th>
        <th>dep</th>
        <th>gender</th>
        <th>feedback</th>
    </tr>
    <?php
   if ($result->num_rows > 0) {
    while ($users = $result->fetch_assoc()) {
        if($users['email'] === $_SESSION['user']){
            echo '<tr style="background-color:rgb(56, 255, 156);">';
            echo '<td>'.$users['id'].'</td>';
            echo '<td>'.$users['name'].'</td>';
            echo '<td>'.$users['phone'].'</td>';
            echo '<td>'.$users['email'].'</td>';
            echo '<td>'.$users['dep'].'</td>';
            echo '<td>'.$users['gender'].'</td>';
            echo '<td>'.$users['feedback'].'</td>';   
            echo '</tr>'; 
        }else{
        echo '<tr>';
        echo '<td>'.$users['id'].'</td>';
        echo '<td>'.$users['name'].'</td>';
        echo '<td>'.$users['phone'].'</td>';
        echo '<td>'.$users['email'].'</td>';
        echo '<td>'.$users['dep'].'</td>';
        echo '<td>'.$users['gender'].'</td>';
        echo '<td>'.$users['feedback'].'</td>';   
        echo '</tr>'; 
        }
    }
}else{
        echo '<tr><td colspan="7">No feedback found</td></tr>';
    }?>

</table>
<div style="text-align: right;"><button><a href="index.php">Back To Home</a></button></div>
</body>
</html>
