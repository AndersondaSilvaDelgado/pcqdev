<?php

$versao = filter_input(INPUT_GET, 'versao', FILTER_DEFAULT);

require_once('../control/QuestaoCTR.class.php');

$questaoCTR = new QuestaoCTR();

echo $questaoCTR->dados($versao);
