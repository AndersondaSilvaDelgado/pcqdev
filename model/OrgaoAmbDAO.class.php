<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of OrgaoAmb
 *
 * @author anderson
 */
class OrgaoAmbDAO extends Conn {
    //put your code here
    
    public function verifOrgaoAmb($idCabec, $orgaoAmb) {

        $select = " SELECT "
                . " COUNT(*) AS QTDE "
                . " FROM "
                . " PCQ_ORGAO_AMB "
                . " WHERE "
                . " TIPO = " . $orgaoAmb->idOrgAmb
                . " AND "
                . " DTHR_CEL = TO_DATE('" . $orgaoAmb->dthrOrgAmb . "','DD/MM/YYYY HH24:MI') "
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

    public function insOrgaoAmb($idCabec, $orgaoAmb) {

        $sql = "INSERT INTO PCQ_ORGAO_AMB ("
                . " CABEC_ID "
                . " , TIPO "
                . " , DTHR "
                . " , DTHR_CEL "
                . " , DTHR_TRANS "
                . " ) "
                . " VALUES ("
                . " " . $idCabec
                . " , " . $orgaoAmb->idOrgAmb
                . " , TO_DATE('" . $orgaoAmb->dthrOrgAmb . "','DD/MM/YYYY HH24:MI') "
                . " , TO_DATE('" . $orgaoAmb->dthrOrgAmb . "','DD/MM/YYYY HH24:MI') "
                . " , SYSDATE "
                . " )";

        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }
    
}
