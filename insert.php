<?php 
    session_start();
    require 'db.php';
   
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dep = $_POST['deptment'];
    $gender = $_POST['gen'];
    $feedback = $_POST['feedback'];

    $query= "SELECT id FROM user WHERE email=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s",$email);
    $stmt->execute();

    if ($stmt->get_result()->fetch_assoc()) {
        $error = "Feedback is already submited";
        header("Location: /sai/index.php?msg=$error");
        exit();
    } 

    $iquery = "INSERT INTO user (name, phone, email, dep, gender, feedback) VALUE (?,?,?,?,?,?)";
    $stmt = $con->prepare($iquery);
    $stmt->bind_param("ssssss",$name,$phone,$email,$dep,$gender,$feedback);

    if ($stmt->execute()) {
        $error = "Feedback submited successful!";
        header("Location: /sai/index.php?msg=$error");
        $_SESSION['user'] = $email;
    } else {
        $error = "Error during submition. Please try again.";
        header("Location: /sai/index.php?msg=$error");
    }
    $stmt->close();
    $conn->close();
?>