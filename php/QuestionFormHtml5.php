<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div align = "left">
      <form id='fquestion' name='fquestion' action=’AddQuestion.php’>
            <h3>Email (*)</h3>
            <input type = "text" id = "email" name = "email" style="WIDTH: 400px" pattern = "[a-z]*[A-Z]*[0-9]+[0-9]+[0-9]+@ikasle[.]ehu[.]e[u]?s|[a-z]*[A-Z]*[.][a-z]*[A-Z]*@ehu[.]e[u]?s|[a-z]*[A-Z]*@ehu[.]e[u]?s"  title = "Introduce un correo de la universidad válido." required>
          
            <h3>Enunciado de la pregunta (*)</h3>
            <input type = "text" id = "enunciado" name = "enunciado" style="WIDTH: 400px" pattern=".{10,}" title = "Mínimo 10 carácteres." required>

            <h3>Respuesta correcta (*)</h3>
            <input type = "text" id = "recor" name = "rescor" style="WIDTH: 400px" required>

            <h3>Respuesta incorrecta 1 (*)</h3>
            <input type = "text" id = "respin1" name = "respin1" style="WIDTH: 400px" required>
 
            <h3>Respuesta incorrecta 2 (*)</h3>
            <input type = "text" id = "respin2" name = "respin2" style="WIDTH: 400px" required>

            <h3>Respuesta incorrecta 3 (*)</h3>
            <input type = "text" id = "respin3" name = "respin3" style="WIDTH: 400px" required>

            <h3>Complejidad de la pregunta (*)</h3>
            <select>
                <option value = "comp1">1</option>
                <option value = "comp2">2</option>
                <option value = "comp3">3</option>
            </select>

            <h3>Tema de la pregunta (*)</h3>
            <input type = "text" id = "tema" name = "tema" style="WIDTH: 400px" required><br><br>
            
            <input type = "submit" value = "Enviar">
        </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
