<?php
    include 'connect.php';

    if(isset($_POST['signin'])) {
        $uname =  $_POST['email'];
	    $pass =  md5($_POST['password']);

		$result = mysqli_query($conn, "SELECT * FROM user WHERE email='$uname' AND password='$pass'");
		$admin = mysqli_query($conn, "SELECT * FROM admin WHERE email='$uname' AND password='$pass'");

		if (mysqli_num_rows($admin) > 0) {
            header("Location: ../pages/mainpage.php");
		    exit();
		} elseif (mysqli_num_rows($result) > 0) {
			header("Location: ../pages/lessons.php");
		    exit();
		}else{
			header("Location: ../pages/signin.php?error=Incorrect email or password!");
	        exit();
		}

    }