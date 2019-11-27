<?php include ("seguridad.php"); ?>
<?php
    if($_SESSION["adUs"] != "user"){
        echo "<script>
                    alert('Esta página solo es accesible para los alumnos y profesores.');
                    window.location.href='Layout.php';    
                </script>";
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src = "../js/jquery-3.4.1.min.js"></script>
    <script src = "../js/AJAXLab6.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div align = "left">
        <h3>Introduce el ID de la pregunta.</h3>
        <input id = 'idPre'>
        <button onclick = "getPregunta($('#idPre').val())">Conseguir datos</button>
        <div align = "center" id = 'mosPre'></div>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>