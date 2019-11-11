<?php

$versao = filter_input(INPUT_GET, 'versao', FILTER_DEFAULT);

require_once('../control/TalhaoCTR.class.php');

$talhaoCTR = new TalhaoCTR();

echo $talhaoCTR->dados($versao);
