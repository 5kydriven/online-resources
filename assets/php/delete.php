<?php
    include 'connect.php';

    if(isset($_POST['click_delete_button'])) {
        $id = $_POST['user_id'];

        $query = mysqli_query($conn, "DELETE FROM user WHERE id='$id'");

        if($query) {
            echo 'deleted';
        }
    }