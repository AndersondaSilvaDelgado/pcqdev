<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of TipoApontDAO
 *
 * @author anderson
 */
class TipoApontDAO extends Conn {
    //put your code here

    public function dados() {

        $select = " SELECT "
                    . " TPAPONTFOG_ID AS \"idTipoApont\" "
                    . " , DESCR AS \"descrTipoApont\" "
                . " FROM " 
                    . " USINAS.TIPO_APONT_FOGO "
                . " ORDER BY " 
                    . " TPAPONTFOG_ID "
                . " ASC ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}
