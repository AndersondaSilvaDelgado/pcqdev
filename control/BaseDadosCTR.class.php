<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/dao/ColabDAO.class.php');
require_once('../model/dao/EquipDAO.class.php');
require_once('../model/dao/QuestaoDAO.class.php');
require_once('../model/dao/RespDAO.class.php');
require_once('../model/dao/SecaoDAO.class.php');
require_once('../model/dao/TalhaoDAO.class.php');
/**
 * Description of BaseDadosCTR
 *
 * @author anderson
 */
class BaseDadosCTR {
    //put your code here
    
    private $base = 2;
    
    public function dadosColab($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $colabDAO = new ColabDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $colabDAO->dados($this->base));
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
    public function dadosEquip($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $equipDAO = new EquipDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $equipDAO->dados($this->base));
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
    public function dadosQuestao($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $questaoDAO = new QuestaoDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $questaoDAO->dados($this->base));
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
    public function dadosResp($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $respDAO = new RespDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $respDAO->dados($this->base));
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
    public function dadosSecao($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $secaoDAO = new SecaoDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $secaoDAO->dados($this->base));
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
    public function dadosTalhao($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $talhaoDAO = new TalhaoDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $talhaoDAO->dados($this->base));
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
}
