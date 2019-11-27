<?php include ("seguridad.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <script src = "../js/jquery-3.4.1.min.js"></script>
    <script src= "../js/ValidateFieldsQuestion.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div align="left">
        <form id= "fquestion" name='fquestion' method ="post" action="AddQuestion.php"  onsubmit = "return comprobarCamposVacios() && comprobarEmail()">
            <h3>Email (*)</h3>
            <input type = "text" id = "email" name = "email" style="WIDTH: 400px">

            <h3>Enunciado de la pregunta (*)</h3>
            <input type = "text" id = "enunciado" name = "enunciado" style="WIDTH: 400px">

            <h3>Respuesta correcta (*)</h3>
            <input type = "text" id = "recor" name = "rescor" style="WIDTH: 400px">

            <h3>Respuesta incorrecta 1 (*)</h3>
            <input type = "text" id = "respin1" name = "respin1" style="WIDTH: 400px">
 
            <h3>Respuesta incorrecta 2 (*)</h3>
            <input type = "text" id = "respin2" name = "respin2" style="WIDTH: 400px">

            <h3>Respuesta incorrecta 3 (*)</h3>
            <input type = "text" id = "respin3" name = "respin3" style="WIDTH: 400px">

            <h3>Complejidad de la pregunta (*)</h3>
            <select name = "complejidad">
                <option value = "1">Baja</option>
                <option value = "2">Media</option>
                <option value = "3">Alta</option>
            </select>

            <h3>Tema de la pregunta (*)</h3>
            <input type = "text" id = "tema" name = "tema" style="WIDTH: 400px"><br><br>
            
            <input type = "submit" value = "Enviar">
        </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
