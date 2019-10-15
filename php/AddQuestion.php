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
    
            $sql = "INSERT INTO preguntas VALUES ('', '$email', '$enunciado', '$rescor', '$respin1', '$respin2', '$respin3', '$complejidad', '$tema')";

            if ($conn->query($sql) === TRUE) {
                echo "Se ha añadido una nueva pregunta.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        ?>
        <br><a href="ShowQuestions.php">Ver todas las preguntas.</a>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>