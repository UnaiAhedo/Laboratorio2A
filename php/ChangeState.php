<?php include ("seguridad.php"); ?>
<?php
    include 'DbConfig.php';
    $email = $_GET['email'];
    $conn = new mysqli($server, $user, $pass, $basededatos);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT acDes FROM usuario where email = '$email'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    if($row[0] == 'desactivada'){
        $sql = "UPDATE usuario SET acDes = 'activada' WHERE email='$email'";
    }else{
        $sql = "UPDATE usuario SET acDes = 'desactivada' WHERE email='$email'";
    }
    
    if ($conn->query($sql) === TRUE) {
        echo "actualizado";
    } else {
        echo "error";
    }

    $conn->close();

?>