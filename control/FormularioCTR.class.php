<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/dao/CabecDAO.class.php');
require_once('../model/dao/ItemDAO.class.php');
require_once('../model/dao/EquipDAO.class.php');
require_once('../model/dao/OrgaoAmbDAO.class.php');
require_once('../model/dao/TalhaoDAO.class.php');
require_once('../model/dao/LogEnvioDAO.class.php');
/**
 * Description of Formulario
 *
 * @author anderson
 */
class FormularioCTR {
    //put your code here
    
    private $base = 2;
    
    public function salvarDados($versao, $info, $pagina) {

        $cabec = $info['cabec'];
        $item = $info['item'];
        $equip = $info['equip'];
        $orgaoamb = $info['orgaoamb'];
        $talhao = $info['talhao'];
        
        $dados = $cabec . $item . $equip . $orgaoamb . $talhao;
        
        $this->salvarLog($cabec, $dados, $pagina, $versao);

        $pagina = $pagina . '-' . $versao;
        $versao = str_replace("_", ".", $versao);

        if ($versao >= 1.00) {

            $cabecJsonObj = json_decode($cabec);
            $itemJsonObj = json_decode($item);
            $equipJsonObj = json_decode($equip);
            $orgaoAmbJsonObj = json_decode($orgaoamb);
            $talhaoJsonObj = json_decode($talhao);

            $cabecDados = $cabecJsonObj->cabec;
            $itemDados = $itemJsonObj->item;
            $equipDados = $equipJsonObj->equip;
            $orgaoAmbDados = $orgaoAmbJsonObj->orgaoamb;
            $talhaoDados = $talhaoJsonObj->talhao;

            return $this->salvarCabec($cabecDados, $itemDados, $equipDados, $orgaoAmbDados, $talhaoDados);
        }
    }
    
    private function salvarLog($cabec, $dados, $pagina, $versao) {
        $logEnvioDAO = new LogEnvioDAO();
        $logEnvioDAO->salvarDados($cabec, $dados, $pagina, $versao, $this->base);
    }
    
    private function salvarCabec($cabecDados, $itemDados, $equipDados, $orgaoAmbDados, $talhaoDados) {
        $cabecDado = new CabecDAO();
        foreach ($cabecDados as $cabec) {
            $v = $cabecDado->verifCabec($cabec, $this->base);
            if ($v == 0) {
                $cabecDado->insCabec($cabec, $this->base);
            }
            $idCabecBD = $cabecDado->idCabec($cabec, $this->base);
        }
        $this->salvarItem($idCabecBD, $itemDados);
        $this->salvarEquip($idCabecBD, $equipDados);
        $this->salvarOrgaoAmb($idCabecBD, $orgaoAmbDados);
        $this->salvarTalhao($idCabecBD, $talhaoDados);
    }
    
    private function salvarItem($idBolBD, $itemDados) {
        $itemDAO = new ItemDAO();
        foreach ($itemDados as $item) {
            $v = $itemDAO->verifItem($idBolBD, $item, $this->base);
            if ($v == 0) {
                $itemDAO->insItem($idBolBD, $item, $this->base);
            }
        }
    }

    private function salvarEquip($idBolBD, $equipDados) {
        $equipDAO = new EquipDAO();
        foreach ($equipDados as $equip) {
            $v = $equipDAO->verifEquip($idBolBD, $equip, $this->base);
            if ($v == 0) {
                $equipDAO->insEquip($idBolBD, $equip, $this->base);
            }
        }
    }
    
    private function salvarOrgaoAmb($idBolBD, $orgaoAmbDados) {
        $orgaoAmbDAO = new OrgaoAmbDAO();
        foreach ($orgaoAmbDados as $orgaoAmb) {
            $v = $orgaoAmbDAO->verifOrgaoAmb($idBolBD, $orgaoAmb, $this->base);
            if ($v == 0) {
                $orgaoAmbDAO->insOrgaoAmb($idBolBD, $orgaoAmb, $this->base);
            }
        }
    }
    
    private function salvarTalhao($idBolBD, $talhaoDados) {
        $talhaoDAO = new TalhaoDAO();
        foreach ($talhaoDados as $talhao) {
            $v = $talhaoDAO->verifTalhao($idBolBD, $talhao, $this->base);
            if ($v == 0) {
                $talhaoDAO->insTalhao($idBolBD, $talhao, $this->base);
            }
        }
    }
    
}
