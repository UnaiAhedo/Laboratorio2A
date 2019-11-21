<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    
    if(isset($_GET['emailReg'])){
        $soapclient = new nusoap_client('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl',true);

        $resultaSOAPEmail = $soapclient->call('comprobar',array('x'=>$_GET['emailReg']));
    
        echo $resultaSOAPEmail;
    } 
?>