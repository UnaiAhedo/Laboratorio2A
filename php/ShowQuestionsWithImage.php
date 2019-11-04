<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <script src = "../js/jquery-3.4.1.min.js"></script>
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
            $email = $_GET['email'];
            $sql = "SELECT email, enunciado, rescor, tema, foto FROM preguntasfoto where email='$email'";
            $result = $conn->query($sql);
            echo "<table border='1'>
                <tr>
                    <th>Email</th>
                    <th>Enunciado</th>
                    <th>Respuesta correcta</th>
                    <th>Tema</th>
                    <th>Foto</th>
                </tr>";
            while($row = mysqli_fetch_array($result)){
                $imagen = $row["foto"];
                echo "<tr>";
                echo "<td>".$row["email"]. "</td>";
                echo "<td>".$row["enunciado"]."</td>";
                echo "<td>".$row["rescor"]."</td>";
                echo "<td>".$row["tema"]."</td>";
                if($row["foto"] == ''){
                    echo "<td>" . '<img width = "100px" height = "100px" src="../images/fondo.png"/>' . "</td>";
                }else{
                    echo "<td>" . '<img width = "100px" height = "100px" src="data:image/*;base64,'.$imagen.'"/>' . "</td>";
                }
                
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
