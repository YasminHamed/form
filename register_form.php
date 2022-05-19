<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
          
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
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
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error2">'.$error.'</span>';
                };
            };
        ?>
        <input type="text" placeholder="UserName" name="name" class="user-input">

        <input type="text" placeholder="Email" name="email" class="user-input">

        <input type="password" placeholder="Password" name="password" class="user-input">

        <input type="password" placeholder="Confirm Password" name="cpassword" class="user-input">

        <select class="user-input" name="user_type">
            <option value="user">user</option>
            <option value="admin">admin</option>
        </select>

        <p class="title3 ">already have an account? <a href="login_form.php">Login</a></p>
        <input type="submit" name="submit" value="Create account" class="submit-button">
    </form>


</body>
</html>
