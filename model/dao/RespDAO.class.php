<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of RespDAO
 *
 * @author anderson
 */
class RespDAO extends Conn  {
    //put your code here
    
    public function dados() {

        $select = "SELECT " 
                        . " ALQUEST_ID AS \"idResp\" "
                        . " , ITQUEST_ID AS \"idQuestao\" "
                        . " , NVL(ITQUEST_ID_SUB, 0) AS \"idSubResp\" "
                        . " , SEQ AS \"seqResp\" "
                        . " , DESCR AS \"descrResp\" "
                    . " FROM " 
                        . " VMB_RESP_QUEIMADA "
                    . " ORDER BY "
                        . " SEQ "
                    . " ASC ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}
