<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/dao/RespDAO.class.php');
/**
 * Description of RespCTR
 *
 * @author anderson
 */
class RespCTR {
    //put your code here
    
    public function dados($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $questaoDAO = new QuestaoDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $questaoDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
}
