<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/CabecDAO.class.php');
require_once('../model/ItemDAO.class.php');
require_once('../model/BrigadistaDAO.class.php');
require_once('../model/EquipDAO.class.php');
require_once('../model/FotoDAO.class.php');
require_once('../model/TalhaoDAO.class.php');
/**
 * Description of Formulario
 *
 * @author anderson
 */
class FormularioCTR {
    
    public function salvarCompleto($info) {

        $dados = $info['dado'];
        $array = explode("_", $dados);

        $cabecJsonObj = json_decode(mb_convert_encoding($array[0], "UTF-8", "ISO-8859-1"));
        $itemJsonObj = json_decode($array[1]);
        $brigadistaJsonObj = json_decode($array[2]);
        $equipJsonObj = json_decode($array[3]);
        $fotoJsonObj = json_decode($array[4]);
        $talhaoJsonObj = json_decode($array[5]);

        $cabecDados = $cabecJsonObj->cabec;
        $itemDados = $itemJsonObj->item;
        $brigadistaDados = $brigadistaJsonObj->brigadista;
        $equipDados = $equipJsonObj->equip;
        $fotoDados = $fotoJsonObj->foto;
        $talhaoDados = $talhaoJsonObj->talhao;

        return $this->salvarCabec($cabecDados, $itemDados, $brigadistaDados, $equipDados, $fotoDados, $talhaoDados);

    }
    
    public function salvarComplemento($info) {

        $dados = $info['dado'];
        $array = explode("_",$dados);

        $cabecJsonObj = json_decode($array[0]);
        $itemJsonObj = json_decode($array[1]);

        $cabecDados = $cabecJsonObj->cabec;
        $itemDados = $itemJsonObj->item;

        return $this->salvarCompl($cabecDados, $itemDados);
        
    }
    
    private function salvarCabec($cabecDados, $itemDados, $brigadistaDados, $equipDados, $fotoDados, $talhaoDados) {
        
        $cabecDAO = new CabecDAO();
        
        foreach ($cabecDados as $cabec) {
            
            $v = $cabecDAO->verifCabec($cabec);
            if ($v == 0) {
                $cabecDAO->insCabec($cabec);
            }
            $idCabecBD = $cabecDAO->idCabec($cabec);
            
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
            $cabecDAO->updCabecCompl($idCabecBD);
            $this->salvarItem($idCabecBD, $itemDados);
            
        }
        
    }
    
    private function salvarItem($idCabecBD, $itemDados) {
        $itemDAO = new ItemDAO();
        foreach ($itemDados as $item) {
            $v = $itemDAO->verifItem($idCabecBD, $item);
            if ($v == 0) {
                $itemDAO->insItem($idCabecBD, $item);
            }
        }
    }

    private function salvarBrigadista($idCabecBD, $brigadistaDados) {
        $brigadistaDAO = new BrigadistaDAO();
        foreach ($brigadistaDados as $brigadista) {
            $v = $brigadistaDAO->verifBrigadista($idCabecBD, $brigadista);
            if ($v == 0) {
                $brigadistaDAO->insBrigadista($idCabecBD, $brigadista);
            }
        }
    }
    
    private function salvarEquip($idCabecBD, $equipDados) {
        $equipDAO = new EquipDAO();
        foreach ($equipDados as $equip) {
            $v = $equipDAO->verifEquip($idCabecBD, $equip);
            if ($v == 0) {
                $equipDAO->insEquip($idCabecBD, $equip);
            }
        }
    }

    private function salvarFoto($idCabecBD, $fotoDados) {
        $fotoDAO = new FotoDAO();
        foreach ($fotoDados as $foto) {
            $v = $fotoDAO->verifFoto($idCabecBD, $foto);
            if ($v == 0) {
                $fotoDAO->insFoto($idCabecBD, $foto);
            }
        }
    }
    
    private function salvarTalhao($idCabecBD, $talhaoDados) {
        $talhaoDAO = new TalhaoDAO();
        foreach ($talhaoDados as $talhao) {
            $v = $talhaoDAO->verifTalhao($idCabecBD, $talhao);
            if ($v == 0) {
                $talhaoDAO->insTalhao($idCabecBD, $talhao);
            }
        }
    }
    
}
