<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <script src="../js/ShowImageInForm.js"></script>
    <script src = "../js/jquery-3.4.1.min.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div align = "left">
        <form method = "post" action = "SignUp.php" enctype = "multipart/form-data">
            <p><b>Usuario* : </b>
            <input type = "radio" name = "usuario" value = "alumno" checked> Alumno
            <input type = "radio" name = "usuario" value = "profesor"> Profesor</p>

            <p><b>Email* : </b><input type = "text" id = "emailR" name = "emailR" style = "WIDTH: 300px"></p>

            <p><b>Nombre y apellidos* : </b><input type = "text" name = "nombre" style = "WIDTH: 300px"></p>

            <p><b>Contraseña* : </b><input type = "password" name = "contra" style = "WIDTH: 300px"></p>

            <p><b>Repetir contraseña* : </b><input type = "password" name = "contraRep" style = "WIDTH: 300px"></p>

            <p><b>Imagen : </b></p>
            <input type = "file" id = "foto" class = "form-control" name = "fotoUsuario" onchange = "mostrarImagen(this)"><br>

            <input id = "enviar" type = "submit" value= "Registrar">
        </form>
        <?php
            include 'DbConfig.php';
    
            if (isset($_POST["emailR"])){
                
                $conn = new mysqli($server, $user, $pass, $basededatos);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $email = $_REQUEST["emailR"]; 
                $nombre = $_REQUEST["nombre"];
                $contra = $_REQUEST["contra"];
                $contraRep = $_REQUEST["contraRep"];
                $alumpro = $_REQUEST["usuario"];
                $imagen = base64_encode(@file_get_contents($_FILES["fotoUsuario"]["tmp_name"]));
                
                if($email == '' || $nombre == '' || $contra == '' || $alumpro == ''){
                    echo "Algún campo está vacío.";
                } else if(preg_match('/[a-z]*[A-Z]*[0-9]+[0-9]+[0-9]+@ikasle[.]ehu[.]e[u]?s/',$email) == 0 && preg_match('/[a-z]*[A-Z]*[.][a-z]*[A-Z]*@ehu[.]e[u]?s/',$email) == 0 && preg_match('/[a-z]*[A-Z]*@ehu[.]e[u]?s/',$email) == 0){
                    echo "<br>El email no es correcto.";
                }else if (strlen($contra) < 6){
                    echo "<br>La contraseña debe contener 6 carácteres como mínimo.";
                }else if($contra != $contraRep){
                    echo "<br>Las contraseñas no coinciden.";
                }else if(str_word_count($nombre, 0) < 2){
                    echo "<br>Introduce nombre y apellido";
                }else if(preg_match('/[a-z]*[A-Z]*[0-9]+[0-9]+[0-9]+@ikasle[.]ehu[.]e[u]?s/',$email) == 1 && $alumpro == 'profesor'){
                    echo "<br>El email no coincide con el usuario escogido.";
                }else if((preg_match('/[a-z]*[A-Z]*[.][a-z]*[A-Z]*@ehu[.]e[u]?s/',$email) == 1 || preg_match('/[a-z]*[A-Z]*@ehu[.]e[u]?s/',$email) == 1) && $alumpro == 'alumno'){
                    echo "<br>El email no coincide con el usuario escogido.";
                }else{
                    $sql = "INSERT INTO usuario VALUES ('$email', '$nombre', '$contra', '$alumpro', '$imagen')";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>
                        alert('Se ha realizado el registro correctamente.');
                        window.location.href='LogIn.php';
                        </script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }     
            }
        ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>