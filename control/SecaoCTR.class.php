<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/dao/SecaoDAO.class.php');
/**
 * Description of FazendaCTR
 *
 * @author anderson
 */
class SecaoCTR {
    //put your code here
    
    public function dados($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $secaoDAO = new SecaoDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $secaoDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
}
