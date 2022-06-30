<?php

require_once('../control/FormularioCTR.class.php');

header('Content-type: application/json');
$body = file_get_contents('php://input');

if (isset($body)):

    $formularioCTR = new FormularioCTR();
    $idCabecArray = $formularioCTR->salvarCompleto($body);
    echo json_encode($idCabecArray);
    
endif;