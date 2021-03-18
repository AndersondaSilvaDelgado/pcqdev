<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
require_once('../model/dao/AjusteDataHoraDAO.class.php');
/**
 * Description of Item
 *
 * @author anderson
 */
class ItemDAO extends Conn {
    //put your code here
    
    public function verifItem($idCabec, $item, $base) {

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

    public function insItem($idCabec, $item, $base) {

        $ajusteDataHoraDAO = new AjusteDataHoraDAO();

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
                . " , " . $ajusteDataHoraDAO->dataHoraGMT($item->dthrItem, $base)
                . " , TO_DATE('" . $item->dthrItem . "','DD/MM/YYYY HH24:MI') "
                . " , SYSDATE "
                . " )";

        $this->Conn = parent::getConn($base);
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }
    
}
