<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of TercCombDAO
 *
 * @author anderson
 */
class TercCombDAO extends Conn {
    //put your code here

    public function dados($base) {

        $select = " SELECT "
                    . " TERCOMBFOG_ID AS \"idTercComb\" "
                    . " , DESCR AS \"descrTercComb\" "
                . " FROM " 
                    . " USINAS.TERC_COMB_FOGO "
                . " ORDER BY " 
                    . " TERCOMBFOG_ID "
                . " ASC ";
        
        $this->Conn = parent::getConn($base);
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}
