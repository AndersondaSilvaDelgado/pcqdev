<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of BrigadistaDAO
 *
 * @author anderson
 */
class BrigadistaDAO extends Conn {
    //put your code here
    
    public function dados() {

        $select = " SELECT "
                    . " FCF.FUNC_ID AS \"idFuncBrigadista\" "
                    . " , FCF.CD AS \"matricBrigadista\" "
                    . " , FCF.NOME AS \"nomeBrigadista\" "
                . " FROM " 
                    . " USINAS.V_FUNC_COMBAT_FOGO FCF "
                . " ORDER BY " 
                    . " FCF.CD "
                . " ASC ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
    public function verifBrigadista($idCabec, $brigad) {

        $select = " SELECT "
                . " COUNT(*) AS QTDE "
                . " FROM "
                . " PCQ_BRIGAD "
                . " WHERE "
                . " FUNC_ID = " . $brigad->idFunc
                . " AND "
                . " DTHR_CEL = TO_DATE('" . $brigad->dthrBrigadista . "','DD/MM/YYYY HH24:MI') "
                . " AND "
                . " CABEC_ID = " . $idCabec;

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        foreach ($result as $item) {
            $v = $item['QTDE'];
        }

        return $v;
    }

    public function insBrigadista($idCabec, $brigad) {

        $sql = "INSERT INTO PCQ_BRIGAD ("
                . " CABEC_ID "
                . " , FUNC_ID "
                . " , DTHR "
                . " , DTHR_CEL "
                . " , DTHR_TRANS "
                . " ) "
                . " VALUES ("
                . " " . $idCabec
                . " , " . $brigad->idFunc
                . " , TO_DATE('" . $brigad->dthrBrigadista . "','DD/MM/YYYY HH24:MI') "
                . " , TO_DATE('" . $brigad->dthrBrigadista . "','DD/MM/YYYY HH24:MI') "
                . " , SYSDATE "
                . " )";

        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }
    
}
