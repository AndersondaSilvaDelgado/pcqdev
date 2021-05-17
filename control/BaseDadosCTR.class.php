<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/dao/BrigadistaDAO.class.php');
require_once('../model/dao/CabecDAO.class.php');
require_once('../model/dao/ColabDAO.class.php');
require_once('../model/dao/EquipDAO.class.php');
require_once('../model/dao/QuestaoDAO.class.php');
require_once('../model/dao/OrigemFogoDAO.class.php');
require_once('../model/dao/RespDAO.class.php');
require_once('../model/dao/SecaoDAO.class.php');
require_once('../model/dao/TalhaoDAO.class.php');
require_once('../model/dao/TercCombDAO.class.php');
require_once('../model/dao/TipoApontDAO.class.php');
/**
 * Description of BaseDadosCTR
 *
 * @author anderson
 */
class BaseDadosCTR {
    //put your code here
    
    private $base = 2;
    
    public function dadosBrigadista($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $brigadistaDAO = new BrigadistaDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $brigadistaDAO->dados($this->base));
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
    public function dadosCabecReaj($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $cabecDAO = new CabecDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $cabecDAO->cabecReaj($this->base));
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
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
    
    public function dadosOrigemFogo($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $origemFogoDAO = new OrigemFogoDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $origemFogoDAO->dados($this->base));
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
    
    public function dadosTercComb($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $tercCombDAO = new TercCombDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $tercCombDAO->dados($this->base));
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
        public function dadosTipoApont($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $tipoApontDAO = new TipoApontDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $tipoApontDAO->dados($this->base));
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
}
