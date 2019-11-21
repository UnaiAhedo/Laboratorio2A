<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    
    if(isset($_GET['contraReg'])){
         $soapclient = new nusoap_client('http://localhost/proyectosw2019/php/VerifyPassWS.php?wsdl',true);

        $resultaSOAPCont = $soapclient->call('comprobarContra',array('contra'=>$_GET['contraReg'],'ticket'=>1010));

        echo $resultaSOAPCont;
    }
?>