<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <script src="../js/ShowImageInForm.js"></script>
    <script src = "../js/jquery-3.4.1.min.js"></script>
    <script src = "../js/ShowQuestionsAjax.js"></script>
    <script src = "../js/AddQuestionsAjax.js"></script>
    <script src = "../js/ShowImageInAjax.js"></script>
    <script src = "../js/CountQuestionsAjax.js"></script>
    <script>
        $('document').ready(
            function myFunction() {
                var url_string = window.location.href;
                var url = new URL(url_string);
                var email = url.searchParams.get("email");
                contarUsuarios();
                contarPreguntas(email);
                setInterval(function(){
                    contarPreguntas(email);
                    contarUsuarios();
                }, 10000);
            }
        );
    </script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
    
   
  <section class="main" id="s1">
      
      <div style = "border:1px solid black; background-color:moccasin">
          <h3>Usuario conectados editando preguntas</h3>
          <p id = "usuariosCon"></p>
      </div>
      
      <br>
      
      <div style = "border:1px solid black; background-color:moccasin">
          <h3>Tus preguntas / Preguntas totales</h3>
          <p id = "pregTotPer"></p>
      </div>
      
      <br>
      
      <div style = "border:1px solid black; background-color:moccasin">
           <form id= "fquestionajax" method = "post" enctype = "multipart/form-data" name = "fquestionajax" action = "AddQuestionWithImage.php">
            <h3>Email (*)</h3>
            <input type = "text" id = "emailPre" name = "emailPre" style="WIDTH: 400px" style="opacity:0.5;" readonly="readonly">

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
            <select name = "complejidad">
                <option value = "1">Baja</option>
                <option value = "2">Media</option>
                <option value = "3">Alta</option>
            </select>

            <h3>Tema de la pregunta (*)</h3>
            <input type = "text" id = "tema" name = "tema" style="WIDTH: 400px"><br>
            
            <h3>Imagen (*)</h3>
            <input type="file" id = "foto" class = "form-control" name = "foto" onchange = "mostrarImagenAjax(this)"><br>
            <br>
            <input type = "button" id = "addAjax" value = "Insertar pregunta" onclick = "addAjaxQues()">
            <input type = "button" id = "showInAjax "value = "Mostrar preguntas" onclick = "mostrarPreguntas()">
            <input type = "button" id = "cleanAjax" value = "Limpiar campos" onclick = "limpiar()">
        </form>
      </div>
      
      <br>
      <br>
      <br>
      <br>
      <b><div id = "mensajeSer"></div></b>
      
      <br>
      
      <div id = "divMostrar"></div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>