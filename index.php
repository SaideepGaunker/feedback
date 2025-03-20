<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>html simple form</title>
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
      <?php
    if (    isset($_GET['msg'])) {
      $error = $_GET['msg'];
      if (strlen($error) > 1) {
        echo '<div class="alert alert-success" style="color: green; text-align: center; padding: 10px;background-color:lightblue; margin-top: 10px;">
          <strong>'.$error.'</strong></div>';
      }
    }
        if(!isset($_SESSION['user'])){
            ?><div class="main"><h1 id="title">FEEDBACK FORM</h1>
                <form action="insert.php" method="POST">
                    <br>
                    <input type="text" placeholder="Enter name" class="same" name="name"><br>
                    <input type="tel" placeholder="Enter phone number" class="same" name="phone"><br>
                    <input type="email" placeholder="Enter email" class="same" name="email"><br>
                    <div class="same">
                        <label> <input type="radio" class="dept" name="deptment" value="IT">IT</label>
                        <label> <input type="radio" class="dept" name="deptment" value="COMP">COMP</label>
                        <label> <input type="radio" class="dept" name="deptment" value="ECOMP">ECOMP</label>
                        <label> <input type="radio" class="dept" name="deptment" value="MECH">MECH</label>    
                    </div><br>
                    <div class="same">
                        <label><input type="radio" class="gender" name="gen" value="m">male</label>
                        <label><input type="radio" class="gender" name="gen" value="f">female</label>
                        <label><input type="radio" class="gender" name="gen" value="o">other</label>
                    </div><br>
                    <textarea placeholder="  give your feedback " class="same" name="feedback"></textarea><br>
                    <button type="submit" class="same sub">SUBMIT</button>            
                    <br>
                </form></div>
       <?php
            }else{
           ?>
                <div class="main sub2">
                    <form><br>
                        <div class="same sub" style="background-color: lightgreen; margin-top: 10px; border: 1px solid black; "><a href="showfeedback.php">ALL FEEDBACK</a></div>
                        <div class="same sub" style="background-color: lightgreen; margin-top: 10px; border: 1px solid black;"><a href="update.php">UPDATE</a></div>
                        <div class="same sub" style="background-color: lightgreen; margin-top: 10px; border: 1px solid black;"><a href="delete.php">DELETE</a></div>
                        <div class="same sub" style="background-color: lightgreen; margin-top: 10px; border: 1px solid black;"><a href="logout.php">LOGOUT</a></div>
                    <br>
                    </form>
                </div>
        <?php }
        ?>    
        <script>

    function validateForm(event) {
        event.preventDefault();
        const name = document.querySelector('input[placeholder="Enter name"]').value;
        const phone = document.querySelector('input[placeholder="Enter phone number"]').value;
        const email = document.querySelector('input[placeholder="Enter email"]').value;
        const department = document.querySelector('input[name="deptment"]:checked');
        const gender = document.querySelector('input[name="gen"]:checked');
        const feedback = document.querySelector('textarea[placeholder="  give your feedback "]').value;

        if (!name || !phone || !email || !department || !gender || !feedback) {
            alert("Please fill all the fields.");
            return;
        }
    }
    </script>

</body>
</html>