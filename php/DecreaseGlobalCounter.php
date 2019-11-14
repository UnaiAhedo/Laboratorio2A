<!DOCTYPE html>
<html>
    <head>
        <script src = "../js/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <?php
            $xml = simplexml_load_file('../xml/Counter.xml');
            $xml->cont = $xml->cont - 1;
            $xml->saveXML('../xml/Counter.xml');
            echo "<script>
                    window.location.href='Layout.php';  
                </script>";
        ?>
    </body>
</html>