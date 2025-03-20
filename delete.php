<?php
    session_start();
    require 'db.php';
    $query = "DELETE FROM user WHERE email=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s",$_SESSION['user']);
    if ($stmt->execute()) {
        $error = "Feedback deleted successful!";
        session_destroy();
        header("Location: /sai/index.php?msg=$error");
    } else {
        $error = "Error during deletion. Please try again.";
        header("Location: /sai/index.php?msg=$error");
    }
    $stmt->close();
    $con->close();
?>