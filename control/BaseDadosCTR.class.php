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
    
    public function dadosBrigadista() {

        $brigadistaDAO = new BrigadistaDAO();

        $dados = array("dados" => $brigadistaDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;

    }
    
    public function dadosCabecReaj() {

        $cabecDAO = new CabecDAO();

        $dados = array("dados" => $cabecDAO->cabecReaj());
        $json_str = json_encode($dados);

        return $json_str;
            
    }
    
    public function dadosColab() {

        $colabDAO = new ColabDAO();

        $dados = array("dados" => $colabDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;
            
    }
    
    public function dadosEquip() {

        $equipDAO = new EquipDAO();

        $dados = array("dados" => $equipDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;
            
    }
    
    public function dadosQuestao() {

        $questaoDAO = new QuestaoDAO();

        $dados = array("dados" => $questaoDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;
            
    }
    
    public function dadosOrigemFogo() {

        $origemFogoDAO = new OrigemFogoDAO();

        $dados = array("dados" => $origemFogoDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;
            
    }
    
    public function dadosResp() {

        $respDAO = new RespDAO();

        $dados = array("dados" => $respDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;
            
    }
    
    public function dadosSecao() {

        $secaoDAO = new SecaoDAO();

        $dados = array("dados" => $secaoDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;
            
    }
    
    public function dadosTalhao() {

        $talhaoDAO = new TalhaoDAO();

        $dados = array("dados" => $talhaoDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;
            
    }
    
    public function dadosTercComb() {

        $tercCombDAO = new TercCombDAO();

        $dados = array("dados" => $tercCombDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;
            
    }
    
    public function dadosTipoApont() {

        $tipoApontDAO = new TipoApontDAO();

        $dados = array("dados" => $tipoApontDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;
            
    }
    
}
