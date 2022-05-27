<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of FazendaDAO
 *
 * @author anderson
 */
class SecaoDAO extends Conn {
    //put your code here
    
    public function dados() {

        $select = "SELECT " 
                        . " PROPRAGR_ID AS \"idSecao\" "
                        . " , CD AS \"codSecao\" "
                        . " , CARACTER(DESCR) AS \"descrSecao\" "
                    . " FROM " 
                        . " V_INFEST_PROPRAGR "
                    . " ORDER BY " 
                        . " PROPRAGR_ID " 
                    . " ASC ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}
