<?php
    include 'connect.php';

    if(isset($_POST['upload'])) {
        // Validate and sanitize user inputs
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
        $link = filter_var($_POST['link'], FILTER_SANITIZE_URL);

        // File upload handling
        $img = $_FILES['image']['name'];
        $tmp_img_name = $_FILES['image']['tmp_name'];
        $dir = '../uploads/' . basename($img);

        // Prepare the SQL statement using prepared statements
        $stmt = $conn->prepare("INSERT INTO lesson (title, content, link, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $content, $link, $img);

        // Execute the prepared statement
        $query = $stmt->execute();

        if($query) {
            move_uploaded_file($tmp_img_name, $dir);
            header('Location: ../pages/mainpage.php');  // Change locattion to Location
            exit(); // Add exit to stop further execution
        } else {
            // Handle the error, log it, or show an appropriate message
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }
?>
