<?php
session_start();
session_unset();
session_destroy();
$error = htmlentities('You have been logged out');
header("Location: /sai/index.php?msg=$error");
?>