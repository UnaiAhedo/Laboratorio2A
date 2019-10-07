<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <script src="../JS/ShowImageInForm.js"></script>
    <script src = "../JS/jquery-3.4.1.min.js"></script>
    <script src= "../JS/ValidateFieldsQuestion.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
      
    <div class="centered" align = "left">
        <form id='fquestion' name='fquestion' action=’AddQuestion.php’ onsubmit = "return comprobarCamposVacios() && comprobarEmail()">
            <h3>Email (*)</h3>
            <input type = "text" id = "email" name = "email" style="WIDTH: 400px">

            <h3>Enunciado de la pregunta (*)</h3>
            <input type = "text" id = "enunciado" name = "enunciado" style="WIDTH: 400px">

            <h3>Respuesta correcta (*)</h3>
            <input type = "text" id = "rescor" name = "rescor" style="WIDTH: 400px">

            <h3>Respuesta incorrecta 1 (*)</h3>
            <input type = "text" id = "respin1" name = "respin1" style="WIDTH: 400px">
 
            <h3>Respuesta incorrecta 2 (*)</h3>
            <input type = "text" id = "respin2" name = "respin2" style="WIDTH: 400px">

            <h3>Respuesta incorrecta 3 (*)</h3>
            <input type = "text" id = "respin3" name = "respin3" style="WIDTH: 400px">

            <h3>Complejidad de la pregunta (*)</h3>
            <select>
                <option value = "comp1">1</option>
                <option value = "comp2">2</option>
                <option value = "comp3">3</option>
            </select>

            <h3>Tema de la pregunta (*)</h3>
            <input type = "text" id = "tema" name = "tema" style="WIDTH: 400px"><br>
            
            <h3>Imagen (*)</h3>
            <input type="file" id = "foto" name="foto" onchange="mostrarImagen(this)"><br>
            <img id="fotomostrar" style="display: none;" width = "100px" height = "100px"><br>
            
            <input type = "submit" value = "Enviar">
        </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
