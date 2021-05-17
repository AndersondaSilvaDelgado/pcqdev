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
    
    public function verifCabec($cabec, $base) {

        $select = " SELECT "
                . " COUNT(*) AS QTDE "
                . " FROM "
                . " PCQ_CABECALHO "
                . " WHERE "
                . " DTHR_CEL = TO_DATE('" . $cabec->dthrCabec . "','DD/MM/YYYY HH24:MI')"
                . " AND "
                . " FUNC_ID = " . $cabec->idFuncCabec . " ";

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

    public function idCabec($cabec, $base) {

        $select = " SELECT "
                . " ID AS ID "
                . " FROM "
                . " PCQ_CABECALHO "
                . " WHERE "
                . " DTHR_CEL = TO_DATE('" . $cabec->dthrCabec. "','DD/MM/YYYY HH24:MI')"
                . " AND "
                . " FUNC_ID = " . $cabec->idFuncCabec . " ";

        $this->Conn = parent::getConn($base);
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        foreach ($result as $item) {
            $id = $item['ID'];
        }

        return $id;
    }

    public function insCabec($cabec, $base) {

        $ajusteDataHoraDAO = new AjusteDataHoraDAO();
        
        if ($cabec->haIncAppCabec == 0) {
            $cabec->haIncAppCabec = 'null';
        }
        
        if ($cabec->haIncForaAppCabec == 0) {
            $cabec->haIncForaAppCabec = 'null';
        }
        
        if ($cabec->tercCombCabec == 0) {
            $cabec->tercCombCabec = 'null';
        }
        
        if ($cabec->comentCabec != 'null') {
            $cabec->comentCabec = "'" . $cabec->comentCabec . "'";
        }
        
        $sql = "INSERT INTO PCQ_CABECALHO ("
                . " FUNC_ID "
                . " , PROPRAGR_ID "
                . " , TPAPONTFOG_ID "
                . " , HA_INC_APP "
                . " , HA_INC_FORA_APP "
                . " , TERCOMBFOG_ID "
                . " , ORIGEMFOG_ID "
                . " , COND_ACEIRO_CANA "
                . " , COND_ACEIRO_APP "
                . " , TIPO "
                . " , COMENTARIO "
                . " , DTHR "
                . " , DTHR_CEL "
                . " , DTHR_TRANS "
                . " , STATUS "
                . " ) "
                . " VALUES ("
                . " " . $cabec->idFuncCabec
                . " , " . $cabec->secaoCabec
                . " , " . $cabec->tipoApontTrabCabec
                . " , " . $cabec->haIncAppCabec
                . " , " . $cabec->haIncForaAppCabec
                . " , " . $cabec->tercCombCabec
                . " , " . $cabec->origemFogoCabec
                . " , " . $cabec->aceiroCanavialCabec
                . " , " . $cabec->aceiroVegetNativalCabec
                . " , " . $cabec->tipoCabec
                . " , " . $cabec->comentCabec
                . " , " . $ajusteDataHoraDAO->dataHoraGMT($cabec->dthrCabec, $base)
                . " , TO_DATE('" . $cabec->dthrCabec. "','DD/MM/YYYY HH24:MI') "
                . " , SYSDATE "
                . " , 1 "
                . " )";

        $this->Conn = parent::getConn($base);
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }
    
    public function cabecReaj($base) {

        $select = " SELECT "
                . " ID AS \"idExtCabec\" "
                . " , TO_CHAR(DTHR,'DD/MM/YYYY HH24:MI') AS \"dthrCabec\" "
                . " , FUNC_ID AS \"idFuncCabec\" "
                . " , TPAPONTFOG_ID AS \"tipoApontTrabCabec\" "
                . " , ORIGEMFOG_ID AS \"origemFogoCabec\" "
                . " , PROPRAGR_ID AS \"secaoCabec\""
                . " , 4 AS \"statusCabec\""
                . " FROM "
                . " PCQ_CABECALHO "
                . " WHERE"
                . " STATUS = 2 "
                . " ORDER BY ID DESC ";
        
        $this->Conn = parent::getConn($base);
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
    public function updCabecCompl($idCabec, $base) {

        $sql = " UPDATE PCQ_CABECALHO "
                . " SET "
                . " STATUS = 3 "
                . " WHERE "
                . " ID = " . $idCabec;
        
        $this->Conn = parent::getConn($base);
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
        
    }
    
    
}
