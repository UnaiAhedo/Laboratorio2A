<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
        <?php
            include 'DbConfig.php';
    
            $conn = new mysqli($server, $user, $pass, $basededatos);
    
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $email = $_REQUEST["email"];
            $enunciado = $_REQUEST["enunciado"];
            $rescor = $_REQUEST["rescor"];
            $respin1 = $_REQUEST["respin1"];
            $respin2 = $_REQUEST["respin2"];
            $respin3 = $_REQUEST["respin3"];
            $complejidad = $_REQUEST["complejidad"];
            $tema = $_REQUEST["tema"];
            $imagen = base64_encode(file_get_contents($_FILES["foto"]["tmp_name"]));
    
            $sql = "INSERT INTO preguntasfoto VALUES ('', '$email', '$enunciado', '$rescor', '$respin1', '$respin2', '$respin3', '$complejidad', '$tema', '$imagen')";

             if ($conn->query($sql) === TRUE) {
                echo "Se ha añadido una nueva pregunta.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        ?>
        <br><a href="ShowQuestionsWithImage.php">Ver todas las preguntas.</a>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>