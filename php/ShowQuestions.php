<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
        <table border = "1">
            <tr>
                <th>Email</th>
                <th>Enunciado</th>
                <th>Respuesta correcta</th>
                <th>Tema</th>
            </tr>
            <?php
                include 'DbConfig.php';
    
                $conn = new mysqli($server, $user, $pass, $basededatos);
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
    
                $sql = "SELECT email, enunciado, rescor, tema FROM preguntas";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["email"]. "</td><td>" . $row["enunciado"] . "</td><td>" . $row["rescor"]. "</td><td>" . $row["tema"] . "</td></tr>";
                    }
                echo "</table>";
                } else { echo "0 results"; }
            $conn->close();
            ?>
        </table>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
