<?php include ("seguridad.php"); ?>
<!DOCTYPE html>
<html>
<head>
<!--  <?php include '../html/Head.html'?>-->
    <script src = "../js/jquery-3.4.1.min.js"></script>
</head>
<body>
<!--  <?php include '../php/Menus.php' ?>-->

<!--  <section class="main" id="s1">-->
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
//                echo "<br><a href='javascript:history.back()'>Volver a la página anterior.</a>";
            } else if(preg_match('/[a-z]*[A-Z]*[0-9]+[0-9]+[0-9]+@ikasle[.]ehu[.]e[u]?s/',$emailPre) == 0 && preg_match('/[a-z]*[A-Z]*[.][a-z]*[A-Z]*@ehu[.]e[u]?s/',$emailPre) == 0 && preg_match('/[a-z]*[A-Z]*@ehu[.]e[u]?s/',$emaiPre) == 0){
                echo "El email no es correcto.";
//                echo "<br><a href='javascript:history.back()'>Volver a la página anterior.</a>"; 
            }else if (strlen($enunciado) < 10){
                echo "El enunciado debe tener como mínimo 10 carácteres.";
//                echo "<br><a href='javascript:history.back()'>Volver a la página anterior.</a>"; 
            }else{
                $conn = new mysqli($server, $user, $pass, $basededatos);
    
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $imagen = base64_encode(@file_get_contents($_FILES["foto"]["tmp_name"]));

                $sql = "INSERT INTO preguntasfoto VALUES ('', '$emailPre', '$enunciado', '$rescor', '$respin1', '$respin2', '$respin3', '$complejidad', '$tema', '$imagen')";

                 if ($conn->query($sql) === TRUE) {
                    echo "Se ha añadido una nueva pregunta a la BD.";
//                    echo "<br><a href='ShowQuestionsWithImage.php?email=$emailPre'>Ver todas las preguntas en la BD.</a>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
                $conn->close(); 
                
                $xml = simplexml_load_file('../xml/Questions.xml');
                if(isset($xml)){
                    $assessmentItem = $xml->addChild('assessmentItem'); 
                    $assessmentItem->addAttribute('subject', $tema);
                    $assessmentItem->addAttribute('author', $emailPre);
                    $itemBody = $assessmentItem->addChild('itemBody');
                    $itemBody->addChild('p', $enunciado);
                    $correctResponse = $assessmentItem->addChild('correctResponse');
                    $correctResponse->addChild('value', $rescor);
                    $incorrectResponses = $assessmentItem->addChild('incorrectResponses');
                    $incorrectResponses->addChild('value', $respin1);
                    $incorrectResponses->addChild('value', $respin2);
                    $incorrectResponses->addChild('value', $respin3);
                    $xml->asXML('../xml/Questions.xml');
                    echo "<br><br>Se ha añadido la pregunta al fichero XML.";
//                    echo "<br><a href='ShowXmlQuestions.php?email=$emailPre'>Ver todas las preguntas XML.</a>";
                }else{
                    echo "<br>No se ha podido añadir la pregunta por XML.";
                }
                
            }
        ?>
    </div>
<!--  </section>-->
<!--  <?php include '../html/Footer.html' ?>-->
</body>
</html>