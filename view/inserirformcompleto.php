<?php

$versao = filter_input(INPUT_GET, 'versao', FILTER_DEFAULT);
$info = filter_input_array(INPUT_POST, FILTER_DEFAULT);

require_once('../control/FormularioCTR.class.php');

if (isset($info)):

    $formularioCTR = new FormularioCTR();
    $formularioCTR->salvarCompleto($versao, $info, "inserirdados");
    echo "GRAVOU-COMPLETO";
    
endif;