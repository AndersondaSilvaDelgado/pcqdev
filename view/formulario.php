<?php

$info = filter_input_array(INPUT_POST, FILTER_DEFAULT);

require_once('../control/FormularioCTR.class.php');

if (isset($info)):

    $formularioCTR = new FormularioCTR();
    $formularioCTR->salvarDados($info);
    echo "GRAVOU";
    
endif;