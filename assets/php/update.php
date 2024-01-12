<?php
    include 'connect.php';

    if(isset($_POST['click_edit_button'])) {
        $id = $_POST['user_id'];
        $arrResult = [];

        $query = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");

        if(mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
                array_push($arrResult, $row);
                header('content-type: application/json');
                echo json_encode($arrResult);
            }
        }
    }

    if(isset($_POST['update_data'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $query = mysqli_query($conn, "UPDATE user SET name='$name', email='$email', gender='$gender' WHERE id='$id'");

        if($query) {
            header('location: ../pages/mainpage.php');
        }
    }