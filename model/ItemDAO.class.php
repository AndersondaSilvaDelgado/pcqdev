<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of Item
 *
 * @author anderson
 */
class ItemDAO extends Conn {
    //put your code here
    
    public function verifItem($idCabec, $item) {

        $select = " SELECT "
                . " COUNT(*) AS QTDE "
                . " FROM "
                . " PCQ_ITEM "
                . " WHERE "
                . " ITQUEST_ID = " . $item->idQuestao
                . " AND "
                . " DTHR_CEL = TO_DATE('" . $item->dthrItem . "','DD/MM/YYYY HH24:MI') "
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

    public function insItem($idCabec, $item) {

        if ($item->idSubResp == 0) {
            $item->idSubResp = 'null';
        }
        
        $sql = "INSERT INTO PCQ_ITEM ("
                . " CABEC_ID "
                . " , ITQUEST_ID "
                . " , ALQUEST_ID "
                . " , ALQUEST_SUB_ID "
                . " , DTHR "
                . " , DTHR_CEL "
                . " , DTHR_TRANS "
                . " ) "
                . " VALUES ("
                . " " . $idCabec
                . " , " . $item->idQuestao
                . " , " . $item->idResp
                . " , " . $item->idSubResp
                . " , TO_DATE('" . $item->dthrItem . "','DD/MM/YYYY HH24:MI') "
                . " , TO_DATE('" . $item->dthrItem . "','DD/MM/YYYY HH24:MI') "
                . " , SYSDATE "
                . " )";

        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }
    
}
