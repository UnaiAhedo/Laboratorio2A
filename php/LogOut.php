<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div align = "left">
         <?php
            echo "<script>
                    alert('Adios, vuelve pronto.');
                    window.location.href='DecreaseGlobalCounter.php';    
                </script>";
        ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>