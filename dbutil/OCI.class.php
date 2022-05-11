<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OCI
 *
 * @author anderson
 */
class OCI {
    
    /** @var PDO */
    private static $Connect = null;

    /**
     * Conecta com o banco de dados com o pattern singleton.
     * Retorna um objeto PDO!
     */
    private static function Conectar() {
        try {

            if (self::$Connect == null) {

                $tns = "  (DESCRIPTION = (ENABLE = BROKEN)(FAILOVER = ON)(LOAD_BALANCE = YES)
                        (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.2.15)(PORT = 1521))
                        (CONNECT_DATA =
                          (SERVER = DEDICATED)
                          (SERVICE_NAME = STAFEDEV)
                          (FAILOVER_MODE =
                            (TYPE = SELECT)
                            (METHOD = BASIC)
                            (RETRIES = 180)
                            (DELAY = 5)
                           )
                        )
                      )";
                

                self::$Connect = oci_connect('INTERFACE', 'FGBNY946', $tns);
                
            }
        } catch (PDOException $e) {
            PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die;
        }

//        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$Connect;
    }

    protected static function getConn() {
        return self::Conectar();
    }
    
}
