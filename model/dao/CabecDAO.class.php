<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
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
                . " FUNC_ID = " . $cabec->idFuncCabec . " ";

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
                . " FUNC_ID = " . $cabec->idFuncCabec . " ";

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
            $cabec->comentCabec = "'" . str_replace(array("#", "'", ";", "*", "%", "$", "@", "!", "{", "}", "[", "]", "(", ")"), '', $cabec->comentCabec) . "'";
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
                . " , DATA_INS "
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
                . " , TO_DATE('" . $cabec->dataInsCabec . "','DD/MM/YYYY')"
                . " , TO_DATE('" . $cabec->dthrCabec. "','DD/MM/YYYY HH24:MI') "
                . " , TO_DATE('" . $cabec->dthrCabec. "','DD/MM/YYYY HH24:MI') "
                . " , SYSDATE "
                . " , 1 "
                . " )";

        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }
    
    public function cabecReaj() {

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
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
    public function updCabecCompl($idCabec) {

        $sql = " UPDATE PCQ_CABECALHO "
                . " SET "
                . " STATUS = 3 "
                . " WHERE "
                . " ID = " . $idCabec;
        
        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
        
    }
    
    
}
