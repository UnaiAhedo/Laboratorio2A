<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    function datosPregunta($id) {
        include 'DbConfig.php';

        $conn = new mysqli($server, $user, $pass, $basededatos);
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT email, enunciado, rescor FROM preguntasfoto WHERE clave=$id";
        $result = $conn->query($sql);
        $cont= mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if ($cont==1) {
            return $row;
        }else{
            return null;
        }
        $conn->close();
    }
    $ns="http://localhost/nusoap-0.9.5/samples";
    $server = new soap_server;
    $server->configureWSDL('datosPregunta',$ns);
    $server->wsdl->schemaTargetNamespace=$ns;

    $server->register("datosPregunta",
        array('id' => 'xsd:int'),
        array('email' => 'xsd:string', 'enunciado' => 'xsd:string', 'rescor' => 'xsd:string'),
        $ns);

    if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
    $server->service($HTTP_RAW_POST_DATA);
    
?>  