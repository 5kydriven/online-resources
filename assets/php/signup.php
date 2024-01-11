<?php
    include 'connect.php';

    if(isset($_POST['signup'])) {
        $name= $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = md5($_POST['password']);
      

        $Rmail = mysqli_query($conn, "SELECT email FROM `user` WHERE email = '$email'");
        

        if(mysqli_num_rows($Rmail) > 0) {
            header("Location: ../pages/signup.php?error=Email address already taken!");
        } else {    
            mysqli_query($conn, "INSERT INTO `user` (`name`, `email`, `password`,`gender`) VALUES ('$name','$email','$password','$gender')");
            header('location: ../pages/signin.php');
            exit();   
        }

    }