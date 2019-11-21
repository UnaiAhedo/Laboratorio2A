<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    function comprobarContra($contra, $ticket) {
        if ($ticket != 1010) {
            return "SIN SERVICIO";
        }else{
            $salir = false;
            
            $fh = fopen("../txt/toppasswords.txt", "r") or die("Unable to open file!");
            while ($line = fgets($fh)){
                if($contra == trim($line)){
                    $salir = true;
                    
                }
            }
            if($salir){
                return "INVALIDA";
            }else{
                return "VALIDA";
            }
            fclose($fichero);
        }
    }


    $ns="http://localhost/nusoap-0.9.5/samples";
    $server = new soap_server;
    $server->configureWSDL('comprobarContra',$ns);
    $server->wsdl->schemaTargetNamespace=$ns;

    $server->register("comprobarContra",
        array('contra' => 'xsd:string', 'ticket' => 'xsd:int'),
        array('return' => 'xsd:string'),
        $ns);

    if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
    $server->service($HTTP_RAW_POST_DATA);

?>  