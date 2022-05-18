<?php

    @include 'config.php';

    $name = $email= $pass = $pass2 = $choice = "" ;
    $nameErr = $emailErr = $passErr2 = $passErr = $choiceErr = "" ;

    if(isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['pass']);
        $pass2 = md5($_POST['pass2']);
        $choice = $_POST['choice'];

        $select = " SELECT * FROM user_form WHERE email = '$email' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'email already exist!';
        } else {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required!";
            } else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                    $nameErr = "Only letters and white spaces are allowed";
                }
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email is required!";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format!";
                }
            }

            if (empty($_POST["choice"])) {
                $choiceErr = "choice is choice!";
            }

            if (empty($_POST["pass"])) {
                $passErr = "Password is required!";
            } else {
                $pass = test_input($_POST["pass"]);
                if (!preg_match("/^S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$pass )) {
                    $passErr = "Invalid password!  (must contain at least 8 characters/one lowercase letter/one uppercase letter / a number)";
                }else{
                    $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name', '$email', '$pass', '$choice')";
                    mysqli_query($conn, $insert);
                    header('location:login_form.php');
                }
            }

            if ($_POST["pass2"] !== $_POST["pass"]) {
                $passErr2 = "Password dismatch!";
            }
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        function test_input($data){
            $data = trim($data); //ignore the spaces
            $data = stripslashes($data); //ignore slashes
            $data = htmlspecialchars($data);
            return $data;
        };

    ?>
    <form method="post" class="bg-white  rounded-5 shadow-5-strong p-5">
        <div class="title2">Register </div>
        <?php 
            if(isset($error)) {
                foreach($error as $error){
                    echo '<span class="error2">'.$error.'</span>';
                }
            }
        ?>         <p class="error"><?php echo $nameErr;  ?></p>
        <input type="text" placeholder="UserName" name="name" class="user-input">

        <span class="error"><?php echo $emailErr;  ?></span>
        <input type="email" placeholder="Email" name="email" class="user-input">

        <span class="error"><?php echo $passErr;  ?></span>
        <input type="password" placeholder="Password" name="pass" class="user-input">

        <span class="error"><?php echo $passErr2;  ?></span>
        <input type="password" placeholder="Confirm Password" name="pass2" class="user-input">

        <span class="error"><?php echo $choiceErr;  ?></span>
        <select class="user-input" name="choice">
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select>

        <p class="title3 ">already have an account? <a href="login_form.php">Login</a></p>
        <input type="submit" name="submit" value="Create account" class="submit-button">
    </form>
</body>
</html>
