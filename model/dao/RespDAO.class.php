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
                        . " , ITQUEST_ID AS \"idQuest\" "
                        . " , ITQUEST_ID_SUB AS \"idSubResp\" "
                        . " , SEQ AS \"seqQuest\" "
                        . " , DESCR AS \"descrQuest\" "
                    . " FROM " 
                        . " VMB_QUEST_QUEIMADA"
                    . " WHERE "
                        . " SUB_PERG = 0 "
                    . " ORDER BY SEQ ASC ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}
