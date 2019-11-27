<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<div id='page-wrap'>
<script src = "../js/jquery-3.4.1.min.js"></script>
    
<?php
    include 'DbConfig.php';
    if (isset($_SESSION['email'])){
        $emailUs = $_SESSION['email'];
        $conn = new mysqli($server, $user, $pass, $basededatos);
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT foto FROM usuario where email='$emailUs'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        if($row[0] == ''){
            $funcion = '../images/usu.png';
        }else{
            $funcion = 'data:image/*;base64,' . $row[0];
        }
        
        echo "
        <header class='main' id='h1'>
            <span class='right' id = 'botLogOut'><a href='LogOut.php'>Logout</a></span>
            <span class='right'><img width = '100px' src = '$funcion' height = '100px' id = 'imagenMenu' alt = 'No se ha podido cargar la imagen de perfil.'></span>
            <p id = 'texUs'>$emailUs</p>
            </header>";
        echo "<script>
             $(document).ready(function(){
                $('#emailPre').attr('value', '$emailUs');
                $('#fquestion').attr('action', 'AddQuestionWithImage.php?email=$emailUs');
            });
        </script>"; 
    }else{
        echo "
        <header class='main' id='h1'>
            <span class='right' id = 'botSignIn'><a href='SignUp.php'>Registro</a></span>
            <span class='right' id = 'botLogIn'><a href='LogIn.php'>Login</a></span>
            <span class='right' id = 'botLogOut' style='display:none;'><a href='LogOut.php'>Logout</a></span>
            <span class='right'><img width = '100px' src = '../images/anon.jpg' height = '100px' id = 'imagenMenu' alt = 'No se ha podido cargar la iamgen de perfil.'></span>
            <p id = 'texUs'>Anónimo</p>
            </header>";
    }
?>   
<?php
    include 'DbConfig.php';

    if(isset($_SESSION["email"])){
        $var = $_SESSION["adUs"];
        if($var == "user"){
            echo "
            <nav class='main' id='n1' role='navigation'>
              <span><a id = 'verL' href='Layout.php'>Inicio</a></span>
              <span><a id = 'inserP' href='HandlingQuizesAjax.php'>Gestionar preguntas</a></span>
              <span><a id = 'inserP' href='ClientGetQuestion.php'>Información pregunta</a></span>
              <span><a id ='verC' href='Credits.php'>Creditos</a></span>
              </nav>";
        }else{
             echo "
            <nav class='main' id='n1' role='navigation'>
              <span><a id = 'verL' href='Layout.php'>Inicio</a></span>
              <span><a id = 'inserP' href='HandlingAccounts.php'>Administrar Usuarios</a></span>
              <span><a id ='verC' href='Credits.php'>Creditos</a></span>
              </nav>";
        }
    }else{
        echo "
        <nav class='main' id='n1' role='navigation'>
          <span><a id = 'verL' href='Layout.php'>Inicio</a></span>
          <span><a id ='verC' href='Credits.php'>Creditos</a></span>
          </nav>";
    }
?>