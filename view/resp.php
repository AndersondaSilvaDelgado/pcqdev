<?php

$versao = filter_input(INPUT_GET, 'versao', FILTER_DEFAULT);

require_once('../control/RespCTR.class.php');

$respCTR = new RespCTR();

echo $respCTR->dados($versao);
