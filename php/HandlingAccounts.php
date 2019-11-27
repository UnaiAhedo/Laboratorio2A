<?php include ("seguridad.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <script src = "../js/jquery-3.4.1.min.js"></script>
    <script src = "../js/AJAXLab7.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
        <?php
            if($_SESSION["adUs"] == "admin"){
                include 'DbConfig.php';
    
                $conn = new mysqli($server, $user, $pass, $basededatos);
                if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM usuario";
                $result = $conn->query($sql);
                echo "<table border='1'>
                    <tr>
                        <th>Email</th>
                        <th>Pass</th>
                        <th>Imagen</th>
                        <th>Estado cuenta</th>
                        <th>Bloqueo</th>
                        <th>Borrar</th>
                    </tr>";
                $i = 0;
                while($row = mysqli_fetch_array($result)){
                    $imagen = $row["foto"];
                    echo "<tr>";
                    echo "<td id = emailA$i>".$row["email"]. "</td>";
                    echo "<td>".$row["contra"]."</td>";
                    if($row["foto"] == ''){
                        echo "<td>" . '<img width = "100px" height = "100px" src="../images/fondo.png"/>' . "</td>";
                    }else{
                        echo "<td>" . '<img width = "100px" height = "100px" src="data:image/*;base64,'.$imagen.'"/>' . "</td>";
                    }
                    echo "<td>".$row["acDes"]."</td>";
                    echo "<td> <button onclick = cambiarEstado(document.getElementById('emailA$i').innerText)>Cambiar estado</button></td>";
                    echo "<td> <button onclick = borrarCuenta(document.getElementById('emailA$i').innerText)>Borrar</button></td>";
                    echo "</tr>";
                    $i = $i + 1;
                }            
                echo "</table>";
            $conn->close();
            }else{
                echo "<script>
                    alert('Esta página solo es accesible para el administrador.');
                    window.location.href='Layout.php';    
                </script>";
            }
            
        ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>