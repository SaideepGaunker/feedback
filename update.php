<?php
session_start();
require 'db.php';

// Fetch existing data for the user
if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];
    $show = "SELECT * FROM user WHERE email=?";
    $stmt = $con->prepare($show);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
} else {
    header("Location: /sai/index.php");
    exit();
}

// Handle form submission to update data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $dep = $_POST['deptment'];
    $gender = $_POST['gen'];
    $feedback = $_POST['feedback'];

    $query = "UPDATE user SET name=?, phone=?, dep=?, gender=?, feedback=? WHERE email=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ssssss", $name, $phone, $dep, $gender, $feedback, $_SESSION['user']);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $error = "Feedback updated successfully!";
        header("Location: /sai/index.php?msg=$error");
    } else {
        $error = "Error during updation. Please try again.";
        header("Location: /sai/index.php?msg=$error");
    }
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
    <style>
        body{
            background-image:url(./WhatsApp\ Image\ 2025-02-16\ at\ 23.20.38_4944b200.jpg);
            background-position:left;
            background-repeat: no-repeat;
            background-size: cover;
        }
        form{
            display: flex;
            flex-direction: column;
            text-transform: capitalize;
            border: 2px solid rgb(142, 14, 27);
            background-color: rgb(255, 219, 127,0.4);
            color: rgb(0, 0, 0);  
            border-radius: 20px; 
            box-shadow: 1px 15px 15px 3px;
        }
        .same{
            border-radius: 18px;
           width: 80%;
           margin: auto;
        }
        input{
            padding: 3%;  }
        textarea{
            height: 80px;
        }
        .sub{
            padding-top:8px;
            padding-bottom:8px;
            background-color: rgb(89, 228, 89);                   
        }
        div{
            text-align: center;
        }
        .main{
            margin: auto; 
            margin-top: 20vh;
            width:40%; 
            #title{
                display: flex;
                flex-direction: column;
                margin: auto;                
                color: rgb(3, 3, 3);
                padding: 25px;
            }
        .sub2{
            padding: 100px;
        }
        a{
            text-decoration: none;
            color: black;
        }
        }
    </style>
</head>
<body>
    <div class="main">
        <h1 id="title">Update Feedback</h1>
<form action="update.php" method="POST">
    <br>
    <input type="text" placeholder="Enter name" class="same" name="name" value="<?php echo htmlspecialchars($result['name']); ?>"><br>
    <input type="tel" placeholder="Enter phone number" class="same" name="phone" value="<?php echo htmlspecialchars($result['phone']); ?>"><br>
    <div title="You can't change you email id"><input type="email" placeholder="Enter email" class="same"  name="email" value="<?php echo htmlspecialchars($result['email']); ?>"></div><br>
    <div class="same">
        <label><input type="radio" class="dept" name="deptment" value="IT" <?php echo ($result['dep'] == 'IT') ? 'checked' : ''; ?>>IT</label>
        <label><input type="radio" class="dept" name="deptment" value="COMP" <?php echo ($result['dep'] == 'COMP') ? 'checked' : ''; ?>>COMP</label>
        <label><input type="radio" class="dept" name="deptment" value="ECOMP" <?php echo ($result['dep'] == 'ECOMP') ? 'checked' : ''; ?>>ECOMP</label>
        <label><input type="radio" class="dept" name="deptment" value="MECH" <?php echo ($result['dep'] == 'MECH') ? 'checked' : ''; ?>>MECH</label>
    </div><br>
    <div class="same">
        <label><input type="radio" class="gender" name="gen" value="m" <?php echo ($result['gender'] == 'm') ? 'checked' : ''; ?>>male</label>
        <label><input type="radio" class="gender" name="gen" value="f" <?php echo ($result['gender'] == 'f') ? 'checked' : ''; ?>>female</label>
        <label><input type="radio" class="gender" name="gen" value="o" <?php echo ($result['gender'] == 'o') ? 'checked' : ''; ?>>other</label>
    </div><br>
    <textarea placeholder="  give your feedback " class="same" name="feedback"><?php echo htmlspecialchars($result['feedback']); ?></textarea><br>
    <button type="submit" class="same sub">SUBMIT</button>
    <br>
</form>
<div>
</body>
</html>
