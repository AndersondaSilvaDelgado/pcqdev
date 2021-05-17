<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of OrigemFogoDAO
 *
 * @author anderson
 */
class OrigemFogoDAO extends Conn {
    //put your code here

    public function dados($base) {

        $select = " SELECT "
                    . " ORIGEMFOG_ID AS \"idOrigemFogo\" "
                    . " , DESCR AS \"descrOrigemFogo\" "
                . " FROM " 
                    . " USINAS.ORIGEM_FOGO "
                . " ORDER BY " 
                    . " ORIGEMFOG_ID "
                . " ASC ";
        
        $this->Conn = parent::getConn($base);
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}
