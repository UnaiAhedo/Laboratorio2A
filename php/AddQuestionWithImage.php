<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <script src = "../js/jquery-3.4.1.min.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>

  <section class="main" id="s1">
    <div>
        <?php
            include 'DbConfig.php';
    
            $emailPre = $_REQUEST["emailPre"];
            $enunciado = $_REQUEST["enunciado"];
            $rescor = $_REQUEST["rescor"];
            $respin1 = $_REQUEST["respin1"];
            $respin2 = $_REQUEST["respin2"];
            $respin3 = $_REQUEST["respin3"];
            $complejidad = $_REQUEST["complejidad"];
            $tema = $_REQUEST["tema"];
    
            if($emailPre == '' || $enunciado == '' || $rescor == '' || $respin1 == '' || $respin2 == '' || $respin3 == '' || $complejidad == '' || $tema == ''){
                echo "Algún campo está vacío.";
                echo "<br><a href='javascript:history.back()'>Volver a la página anterior.</a>";
            } else if(preg_match('/[a-z]*[A-Z]*[0-9]+[0-9]+[0-9]+@ikasle[.]ehu[.]e[u]?s/',$emailPre) == 0 && preg_match('/[a-z]*[A-Z]*[.][a-z]*[A-Z]*@ehu[.]e[u]?s/',$emailPre) == 0 && preg_match('/[a-z]*[A-Z]*@ehu[.]e[u]?s/',$emaiPre) == 0){
                echo "El email no es correcto.";
                echo "<br><a href='javascript:history.back()'>Volver a la página anterior.</a>"; 
            }else if (strlen($enunciado) < 10){
                echo "El enunciado debe tener como mínimo 10 carácteres.";
                echo "<br><a href='javascript:history.back()'>Volver a la página anterior.</a>"; 
            } else{
                $conn = new mysqli($server, $user, $pass, $basededatos);
    
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $imagen = base64_encode(file_get_contents($_FILES["foto"]["tmp_name"]));

                $sql = "INSERT INTO preguntasfoto VALUES ('', '$emailPre', '$enunciado', '$rescor', '$respin1', '$respin2', '$respin3', '$complejidad', '$tema', '$imagen')";

                 if ($conn->query($sql) === TRUE) {
                    echo "Se ha añadido una nueva pregunta.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
                echo "<br><a href='ShowQuestionsWithImage.php?email=$emailPre'>Ver todas las preguntas.</a>";
            }
           
        ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>