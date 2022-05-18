<?php

    @include 'config.php';
    session_start();

    $name = $email= $pass = $pass2 = $choice = "" ;
    $nameErr = $emailErr = $passErr2 = $passErr = $choiceErr = "" ;

    if(isset($_POST['submit'])) {
        // $email = mysqli_real_escape_string($conn, $_POST['email']);
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);

        $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);

            if($row['choice'] == 'admin'){

                $_SESSION['admin_name'] = $row['name'];
                header("Location: admin_page.php");

            }elseif($row['choice'] == 'user'){

                $_SESSION['user_name'] = $row['name'];
                header("Location: user_page.php");
            }

        }else{
            $error[] = 'incorrect email or password!';
        }

    }

?>
<?php

    // @include 'config.php';

    // session_start();

    
    // $name = $email= $pass = $pass2 = $choice = "" ;
    // $nameErr = $emailErr = $passErr2 = $passErr = $choiceErr = "" ;

    // $email = $_POST["email"];
    // $pass = $_POST["pass"];

    // $check_email = mysqli_query($conn, "SELECT Email FROM crud where Email = '$email' ");
    // if(mysqli_num_rows($check_email) > 0){
    //     echo('Email Already exists');
    // }
    // else{
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $result = mysqli_query($conn, "INSERT INTO crud (Firstname, Lastname, Email, Password) VALUES ('$firstname', '$lastname', '$email', '$pass')");
    //     }
    //     echo('Record Entered Successfully');
    // }


    // if(isset($_POST['submit'])){

    // $email = mysqli_real_escape_string($conn, $_POST['email']);
    // $pass = md5($_POST['pass']);

    // $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    // $result = mysqli_query($conn, $select);

    // if(mysqli_num_rows($result) > 0){

    //     $row = mysqli_fetch_array($result);

    //     if($row['choice'] == 'admin'){

    //         $_SESSION['admin_name'] = $row['name'];
    //         header('location:admin_page.php');

    //     }elseif($row['choice'] == 'user'){

    //         $_SESSION['user_name'] = $row['name'];
    //         header('location:user_page.php');

    //     }
        
    // }else{
    //     $error[] = 'incorrect email or password!';
    // }

    // };
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
    <form method="post" class="bg-white rounded-5 shadow-5-strong p-5">
        <div class="title">Login</div>

        <?php 
            if(isset($error)) {
                foreach($error as $error){
                    echo '<span class="error2">'.$error.'</span>';
                }
            }
        ?> 

        <input name="email" type="email" placeholder="Email" class="user-input">

        <input name="pass" type="password" placeholder="Password" class="user-input">
        <p class="title3 ">don't have an account? <a href="register_form.php">register</a></p>
        <input name="submit" type="submit" value="Start" class="submit-button">
    </form>
</body>
</html>
