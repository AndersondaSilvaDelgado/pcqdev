<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of TalhaoDAO
 *
 * @author anderson
 */
class TalhaoDAO extends Conn {
    //put your code here

    public function dados($base) {

        $select = " SELECT "
                    . " TALHAO_ID AS \"idTalhao\" "
                    . " , PROPRAGR_ID AS \"idSecao\" "
                    . " , NRO AS \"codTalhao\" "
                . " FROM "
                    . " USINAS.V_INFEST_TALHAO"
                . " ORDER BY "
                    . " TALHAO_ID "
                . " ASC ";
        
        $this->Conn = parent::getConn($base);
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
    public function verifTalhao($idCabec, $talhao, $base) {

        $select = " SELECT "
                . " COUNT(*) AS QTDE "
                . " FROM "
                . " PCQ_TALHAO "
                . " WHERE "
                . " TALHAO_ID = " . $talhao->idTalhao
                . " AND "
                . " DTHR_CEL = TO_DATE('" . $talhao->dthrTalhao . "','DD/MM/YYYY HH24:MI') "
                . " AND "
                . " CABEC_ID = " . $idCabec;

        $this->Conn = parent::getConn($base);
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        foreach ($result as $item) {
            $v = $item['QTDE'];
        }

        return $v;
    }

    public function insTalhao($idCabec, $talhao, $base) {

        $ajusteDataHoraDAO = new AjusteDataHoraDAO();

        $this->Conn = parent::getConn($base);
        
        if($talhao->tipoTalhao === 1){
            
            $sql = "INSERT INTO PCQ_TALHAO ("
                    . " CABEC_ID "
                    . " , TALHAO_ID"
                    . " , HA_INC"
                    . " , ALT_CANA "
                    . " , DTHR "
                    . " , DTHR_CEL "
                    . " , DTHR_TRANS"
                    . " , TP_INC "
                    . " ) "
                    . " VALUES ("
                    . " " . $idCabec
                    . " , " . $talhao->idTalhao
                    . " , " . $talhao->haIncCanaTalhao
                    . " , " . $talhao->altCanaTalhao
                    . " , " . $ajusteDataHoraDAO->dataHoraGMT($talhao->dthrTalhao, $base)
                    . " , TO_DATE('" . $talhao->dthrTalhao . "','DD/MM/YYYY HH24:MI') "
                    . " , SYSDATE "
                    . " , 1 "
                    . " )";
    
            $this->Create = $this->Conn->prepare($sql);
            $this->Create->execute();
            
        }
        else if($talhao->tipoTalhao === 2){
            
            $sql = "INSERT INTO PCQ_TALHAO ("
                    . " CABEC_ID "
                    . " , TALHAO_ID"
                    . " , HA_INC"
                    . " , ALT_CANA "
                    . " , DTHR "
                    . " , DTHR_CEL "
                    . " , DTHR_TRANS"
                    . " , TP_INC "
                    . " ) "
                    . " VALUES ("
                    . " " . $idCabec
                    . " , " . $talhao->idTalhao
                    . " , " . $talhao->haIncPalhadaTalhao
                    . " , NULL "
                    . " , " . $ajusteDataHoraDAO->dataHoraGMT($talhao->dthrTalhao, $base)
                    . " , TO_DATE('" . $talhao->dthrTalhao . "','DD/MM/YYYY HH24:MI') "
                    . " , SYSDATE "
                    . " , 2 "
                    . " )";
    
            $this->Create = $this->Conn->prepare($sql);
            $this->Create->execute();
            
        }
        else{
            
            $sql = "INSERT INTO PCQ_TALHAO ("
                    . " CABEC_ID "
                    . " , TALHAO_ID"
                    . " , HA_INC"
                    . " , ALT_CANA "
                    . " , DTHR "
                    . " , DTHR_CEL "
                    . " , DTHR_TRANS"
                    . " , TP_INC "
                    . " ) "
                    . " VALUES ("
                    . " " . $idCabec
                    . " , " . $talhao->idTalhao
                    . " , " . $talhao->haIncCanaTalhao
                    . " , " . $talhao->altCanaTalhao
                    . " , " . $ajusteDataHoraDAO->dataHoraGMT($talhao->dthrTalhao, $base)
                    . " , TO_DATE('" . $talhao->dthrTalhao . "','DD/MM/YYYY HH24:MI') "
                    . " , SYSDATE "
                    . " , 1 "
                    . " )";
    
            $this->Create = $this->Conn->prepare($sql);
            $this->Create->execute();
            
            $sql = "INSERT INTO PCQ_TALHAO ("
                    . " CABEC_ID "
                    . " , TALHAO_ID"
                    . " , HA_INC"
                    . " , ALT_CANA "
                    . " , DTHR "
                    . " , DTHR_CEL "
                    . " , DTHR_TRANS"
                    . " , TP_INC "
                    . " ) "
                    . " VALUES ("
                    . " " . $idCabec
                    . " , " . $talhao->idTalhao
                    . " , " . $talhao->haIncPalhadaTalhao
                    . " , NULL "
                    . " , " . $ajusteDataHoraDAO->dataHoraGMT($talhao->dthrTalhao, $base)
                    . " , TO_DATE('" . $talhao->dthrTalhao . "','DD/MM/YYYY HH24:MI') "
                    . " , SYSDATE "
                    . " , 2 "
                    . " )";
    
            $this->Create = $this->Conn->prepare($sql);
            $this->Create->execute();
            
        }
        
    }
    
}
