<?php 
    include 'DbConfig.php'; 
     
    if (isset($_POST['emailL'])){ 
 
        $conn = new mysqli($server, $user, $pass, $basededatos); 
 
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error); 
        } 
 
        $username = $_REQUEST['emailL'];  
        $pass = $_REQUEST['contraL'];    
         
        $contraBD = mysqli_query( $conn,"select contra from usuario where email ='$username'"); 
        $contraBD = mysqli_fetch_array($contraBD); 
        $contraComp = $contraBD['contra']; 
                 
        $contraCrip = crypt($pass, $contraComp); 
         
        $usuarios = mysqli_query( $conn,"select * from usuario where email ='$username' and contra ='$contraCrip'"); 
        $cont= mysqli_num_rows($usuarios); 
        mysqli_close($conn); 
        $row = mysqli_fetch_array($usuarios); 
        if(!isset($_SESSION["email"])){ 
            if($cont==1 && $row["acDes"] == 'activada'){
                session_start();
                $_SESSION["email"] = $username; 
                if($username == "admin@ehu.es"){ 
                    $adUs = "admin"; 
                    $_SESSION["adUs"] = $adUs; 
                }else{ 
                    $adUs = "user"; 
                    $_SESSION["adUs"] = $adUs; 
                } 
            } 
        } 
    } 
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src = "../js/jquery-3.4.1.min.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div align = "left">
        <form method = "post" action = "LogIn.php">
            <p><b>Email : </b><input type = "text" name = "emailL" style="WIDTH: 300px"></p>

            <p><b>Contraseña : </b><input type = "password" name = "contraL" style="WIDTH: 300px"></p>

            <input type = "submit" id = "hacerLogIn" value= "Acceder">
        </form>
        <?php
            include 'DbConfig.php';
    
            if (isset($_POST['emailL'])){
                
                $conn = new mysqli($server, $user, $pass, $basededatos);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $username = $_REQUEST['emailL']; 
                $pass = $_REQUEST['contraL']; 
                
                $contraBD = mysqli_query( $conn,"select contra from usuario where email ='$username'"); 
                $contraBD = mysqli_fetch_array($contraBD); 
                $contraComp = $contraBD['contra']; 
                 
                $contraCrip = crypt($pass, $contraComp); 
                 
                $usuarios = mysqli_query( $conn,"select * from usuario where email ='$username' and contra ='$contraCrip'"); 
                $cont= mysqli_num_rows($usuarios);
                $row = mysqli_fetch_array($usuarios);
                mysqli_close($conn); 
                if($cont==1 && $row["acDes"] == 'activada'){
                    echo "<script>
                            alert('Bienvenido al sistema: ". $username . "');
                            window.location.href='IncreaseGlobalCounter.php';   
                        </script>";
                }else {
                    echo("Par&aacute;metros de login incorrectos o el usuario ha sido desactivado.");
                }
            }
        ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>