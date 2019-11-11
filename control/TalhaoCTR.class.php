<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/dao/TalhaoDAO.class.php');
/**
 * Description of TalhaCTR
 *
 * @author anderson
 */
class TalhaoCTR {
    //put your code here
    
    public function dados($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $talhaoDAO = new TalhaoDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $talhaoDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
}
