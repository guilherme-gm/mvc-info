<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lib;

/**
 * Description of DB
 *
 * @author guilh
 */
class DB {
    
    /**
     *
     * @var \mysqli
     */
    protected $connection;
    
    public function __construct($host, $user, $password, $db_name) {
	$this->connection = new \mysqli($host, $user, $password, $db_name);
	
	if (mysqli_connect_error()) {
	    throw new Exception("Não foi possível conectar ao Banco de Dados. Erro: ".mysqli_connect_error().".");
	}
    }
    
    public function getConnection() {
	return $this->connection;
    }
    
    public function close() {
	if ($this->connection) {
	    $this->connection->close();
	}
    }
    
}
