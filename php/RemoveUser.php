<?php
    include 'DbConfig.php';
    $email = $_GET['email'];
    $conn = new mysqli($server, $user, $pass, $basededatos);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM usuario WHERE email='$email'";
    
    if ($conn->query($sql) === TRUE) {
        echo "borrado";
    } else {
        echo "error";
    }

    $conn->close();

?>