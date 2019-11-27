<?php include ("seguridad.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <script src = "../js/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <?php
            if($_SESSION["adUs"] != "user"){
                echo "<script>
                        window.location.href='Layout.php';  
                </script>";
            }else{
                $xml = simplexml_load_file('../xml/Counter.xml');
                $xml->cont = $xml->cont - 1;
                $xml->saveXML('../xml/Counter.xml');
                echo "<script>
                        window.location.href='Layout.php';  
                    </script>";
            }  
            session_destroy();
        ?>
    </body>
</html>