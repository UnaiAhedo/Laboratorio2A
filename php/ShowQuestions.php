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
            $sql = "SELECT email, enunciado, rescor, tema FROM preguntas";
            $result = $conn->query($sql);
            echo "<table border='1'>
                <tr>
                    <th>Email</th>
                    <th>Enunciado</th>
                    <th>Respuesta correcta</th>
                    <th>Tema</th>
                </tr>";

            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row["email"]. "</td>";
                echo "<td>".$row["enunciado"]."</td>";
                echo "<td>".$row["rescor"]."</td>";
                echo "<td>" .$row["tema"]. "</td>";
                echo "</tr>";
            }            
            echo "</table>";
        $conn->close();
        ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
