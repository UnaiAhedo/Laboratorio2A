<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    
    if(isset($_GET['id'])){
        $soapclient = new nusoap_client('http://localhost/proyectosw2019/php/GetQuestionWS.php?wsdl',true);

        $resultaSOAPPreg = $soapclient->call('datosPregunta',array('id'=>$_GET['id']));
        
        if($resultaSOAPPreg == null){
            echo "<b>Autor: </b>";
            echo "<br>";
            echo "<b>Pregunta: </b>";
            echo "<br>";
            echo "<b>Respuesta correcta: </b>";
        }else{
            echo "<b>Autor: </b>" . $resultaSOAPPreg['email'];
            echo "<br>";
            echo "<b>Pregunta: </b>" . $resultaSOAPPreg['enunciado'];
            echo "<br>";
            echo "<b>Respuesta correcta: </b>" . $resultaSOAPPreg['rescor'];
        }
    }
?>