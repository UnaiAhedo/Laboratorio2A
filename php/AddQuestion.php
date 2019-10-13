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
    
            $sql = "INSERT INTO PREGUNTAS VALUES ('','".$_POST["email"]."','".$_POST["enunciado"]."','".$_POST["rescor"]."','".$_POST["respin1"]."','".$_POST["respin2"]."','".$_POST["respin3"]."','".$_POST["complejidad"]."','".$_POST["tema"]."')";

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
