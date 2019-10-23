<div id='page-wrap'>
<script src = "../js/jquery-3.4.1.min.js"></script>
<header class='main' id='h1'>
    <span class="right" id = "botSignIn"><a href="SignUp.php">Registro</a></span>
    <span class="right" id = "botLogIn"><a href="LogIn.php">Login</a></span>
    <span class="right" id = "botLogOut" style="display:none;"><a href="LogOut.php">Logout</a></span>
    <span class="right"><img width = "100px" height = "100px" id = "imagenMenu" alt = 'No se ha podido cargar la iamgen de perfil.'></span>
    <p id = "texUs">Anónimo</p>
</header>
<nav class='main' id='n1' role='navigation'>
  <span><a id = 'verL' href='Layout.php'>Inicio</a></span>
  <span><a id = 'inserP' href='QuestionFormWithImage.php' style='display:none;'> Insertar Pregunta</a></span>
  <span><a id = 'verP' href='ShowQuestionsWithImage.php' style='display:none;'> Ver preguntas</a></span>
  <span><a id ='verC' href='Credits.php'>Creditos</a></span>
</nav>
    <?php
    include 'DbConfig.php';
    if (isset($_GET['email'])){
        $emailUs = $_GET['email'];
        $conn = new mysqli($server, $user, $pass, $basededatos);
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT foto FROM usuario where email='$emailUs'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $funcion = 'data:image/*;base64,' . $row[0];
        echo "<script>$('#imagenMenu').attr('src','$funcion');</script>";
        echo "<script>
             $(document).ready(function(){
                $('#botLogOut').attr('style', 'display:inline;');
                $('#botLogIn').attr('style', 'display:none;');
                $('#botSignIn').attr('style', 'display:none;');
                $('#inserP').attr('style', 'display:inline;');
                $('#verP').attr('style', 'display:inline;');
                $('#texUs').html('$emailUs');
                $('#inserP').attr('href', 'QuestionFormWithImage.php?email=$emailUs');
                $('#verP').attr('href', 'ShowQuestionsWithImage.php?email=$emailUs');
                $('#verC').attr('href', 'Credits.php?email=$emailUs');
                $('#verL').attr('href', 'Layout.php?email=$emailUs');
                $('#emailPre').attr('value', '$emailUs');
                $('#fquestion').attr('action', 'AddQuestionWithImage.php?email=$emailUs');
                
            });
        </script>"; 
    }else{
        echo "<script>$('#imagenMenu').attr('src','../images/anon.jpg');</script>";
    }
?>