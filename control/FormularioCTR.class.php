<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/dao/CabecDAO.class.php');
require_once('../model/dao/ItemDAO.class.php');
require_once('../model/dao/BrigadistaDAO.class.php');
require_once('../model/dao/EquipDAO.class.php');
require_once('../model/dao/FotoDAO.class.php');
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
    
    public function salvarCompleto($versao, $info, $pagina) {

        $cabec = $info['cabec'];
        $item = $info['item'];
        $brigadista = $info['brigadista'];
        $equip = $info['equip'];
        $foto = $info['foto'];
        $talhao = $info['talhao'];
        
        $dados = $cabec . $item . $equip . $talhao;
        
        $this->salvarLog($cabec, $dados, $pagina, $versao);

        $pagina = $pagina . '-' . $versao;
        $versao = str_replace("_", ".", $versao);

        if ($versao >= 1.00) {

            $cabecJsonObj = json_decode($cabec);
            $itemJsonObj = json_decode($item);
            $brigadistaJsonObj = json_decode($brigadista);
            $equipJsonObj = json_decode($equip);
            $fotoJsonObj = json_decode($foto);
            $talhaoJsonObj = json_decode($talhao);

            $cabecDados = $cabecJsonObj->cabec;
            $itemDados = $itemJsonObj->item;
            $brigadistaDados = $brigadistaJsonObj->brigadista;
            $equipDados = $equipJsonObj->equip;
            $fotoDados = $fotoJsonObj->foto;
            $talhaoDados = $talhaoJsonObj->talhao;

            return $this->salvarCabec($cabecDados, $itemDados, $brigadistaDados, $equipDados, $fotoDados, $talhaoDados);
        }
    }
    
    public function salvarComplemento($versao, $info, $pagina) {

        $cabec = $info['cabec'];
        $item = $info['item'];
        
        $dados = $cabec . $item;
        
//        $this->salvarLog($cabec, $dados, $pagina, $versao);

        $pagina = $pagina . '-' . $versao;
        $versao = str_replace("_", ".", $versao);

        if ($versao >= 1.00) {

            $cabecJsonObj = json_decode($cabec);
            $itemJsonObj = json_decode($item);

            $cabecDados = $cabecJsonObj->cabec;
            $itemDados = $itemJsonObj->item;

            return $this->salvarCompl($cabecDados, $itemDados);
        }
    }
    
    private function salvarLog($cabec, $dados, $pagina, $versao) {
        $logEnvioDAO = new LogEnvioDAO();
        $logEnvioDAO->salvarDados($cabec, $dados, $pagina, $versao, $this->base);
    }
    
    private function salvarCabec($cabecDados, $itemDados, $brigadistaDados, $equipDados, $fotoDados, $talhaoDados) {
        
        $cabecDAO = new CabecDAO();
        
        foreach ($cabecDados as $cabec) {
            
            $v = $cabecDAO->verifCabec($cabec, $this->base);
            if ($v == 0) {
                $cabecDAO->insCabec($cabec, $this->base);
            }
            $idCabecBD = $cabecDAO->idCabec($cabec, $this->base);
            
            $this->salvarItem($idCabecBD, $itemDados);
            $this->salvarBrigadista($idCabecBD, $brigadistaDados);
            $this->salvarEquip($idCabecBD, $equipDados);
            $this->salvarFoto($idCabecBD, $fotoDados);
            $this->salvarTalhao($idCabecBD, $talhaoDados);
            
        }

    }
    
    private function salvarCompl($cabecDados, $itemDados) {
        
        $cabecDAO = new CabecDAO();
        foreach ($cabecDados as $cabec) {
            
            $idCabecBD = $cabec->idExtCabec;
            $cabecDAO->updCabecCompl($idCabecBD, $this->base);
            $this->salvarItem($idCabecBD, $itemDados);
            
        }
        
    }
    
    private function salvarItem($idCabecBD, $itemDados) {
        $itemDAO = new ItemDAO();
        foreach ($itemDados as $item) {
            $v = $itemDAO->verifItem($idCabecBD, $item, $this->base);
            if ($v == 0) {
                $itemDAO->insItem($idCabecBD, $item, $this->base);
            }
        }
    }

    private function salvarBrigadista($idCabecBD, $brigadistaDados) {
        $brigadistaDAO = new BrigadistaDAO();
        foreach ($brigadistaDados as $brigadista) {
            $v = $brigadistaDAO->verifBrigadista($idCabecBD, $brigadista, $this->base);
            if ($v == 0) {
                $brigadistaDAO->insBrigadista($idCabecBD, $brigadista, $this->base);
            }
        }
    }
    
    private function salvarEquip($idCabecBD, $equipDados) {
        $equipDAO = new EquipDAO();
        foreach ($equipDados as $equip) {
            $v = $equipDAO->verifEquip($idCabecBD, $equip, $this->base);
            if ($v == 0) {
                $equipDAO->insEquip($idCabecBD, $equip, $this->base);
            }
        }
    }

    private function salvarFoto($idCabecBD, $fotoDados) {
        $fotoDAO = new FotoDAO();
        foreach ($fotoDados as $foto) {
            $v = $fotoDAO->verifFoto($idCabecBD, $foto, $this->base);
            if ($v == 0) {
                $fotoDAO->insFoto($idCabecBD, $foto, $this->base);
            }
        }
    }
    
    private function salvarTalhao($idCabecBD, $talhaoDados) {
        $talhaoDAO = new TalhaoDAO();
        foreach ($talhaoDados as $talhao) {
            $v = $talhaoDAO->verifTalhao($idCabecBD, $talhao, $this->base);
            if ($v == 0) {
                $talhaoDAO->insTalhao($idCabecBD, $talhao, $this->base);
            }
        }
    }
    
}
