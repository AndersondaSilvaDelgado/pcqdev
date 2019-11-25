<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
require_once('../model/dao/AjusteDataHoraDAO.class.php');
/**
 * Description of Cabec
 *
 * @author anderson
 */
class CabecDAO extends Conn {
    //put your code here
    
    public function verifCabec($cabec) {

        $select = " SELECT "
                . " COUNT(*) AS QTDE "
                . " FROM "
                . " PCQ_CABECALHO "
                . " WHERE "
                . " DTHR_CEL = TO_DATE('" . $cabec->dthrCabec . "','DD/MM/YYYY HH24:MI')"
                . " AND "
                . " MATRIC_FUNC = " . $cabec->matricColabCabec . " ";

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

    public function idCabec($cabec) {

        $select = " SELECT "
                . " ID AS ID "
                . " FROM "
                . " PCQ_CABECALHO "
                . " WHERE "
                . " DTHR_CEL = TO_DATE('" . $cabec->dthrCabec. "','DD/MM/YYYY HH24:MI')"
                . " AND "
                . " MATRIC_FUNC = " . $cabec->matricColabCabec . " ";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        foreach ($result as $item) {
            $id = $item['ID'];
        }

        return $id;
    }

    public function insCabec($cabec) {

        $ajusteDataHoraDAO = new AjusteDataHoraDAO();

        $sql = "INSERT INTO PCQ_CABECALHO ("
                . " MATRIC_FUNC "
                . " , PROPRAGR_ID "
                . " , HA_INC_CANA "
                . " , HA_INC_PALHADA "
                . " , HA_INC_RES_LEGAL "
                . " , HA_INC_APP "
                . " , HA_INC_AREA_COMUM "
                . " , QTDE_BRIGADISTA "
                . " , EMPRESA_AUX "
                . " , COMENTARIO "
                . " , DTHR "
                . " , DTHR_CEL "
                . " , DTHR_TRANS "
                . " ) "
                . " VALUES ("
                . " " . $cabec->matricColabCabec
                . " , " . $cabec->secaoCabec
                . " , " . $cabec->haIncCanaCabec
                . " , " . $cabec->haIncPalhadaCabec
                . " , " . $cabec->haIncResLegalCabec
                . " , " . $cabec->haIncAppCabec
                . " , " . $cabec->haIncAreaComumCabec
                . " , " . $cabec->qtdeBrigadistaCabec
                . " , '" . $cabec->empresaTercCabec . "'"
                . " , '" . $cabec->comentCabec . "'"
                . " , " . $ajusteDataHoraDAO->dataHoraGMT($cabec->dthrCabec)
                . " , TO_DATE('" . $cabec->dthrCabec. "','DD/MM/YYYY HH24:MI') "
                . " , SYSDATE "
                . " )";

        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }
    
}
