<?php

$versao = filter_input(INPUT_GET, 'versao', FILTER_DEFAULT);

require_once('../control/SecaoCTR.class.php');

$secaoCTR = new SecaoCTR();

echo $secaoCTR->dados($versao);
