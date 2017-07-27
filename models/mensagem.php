<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

use Lib\DB;
use Lib\Model;

/**
 * Description of Mensagem
 *
 * @author guilh
 */
class Mensagem extends Model {

    private $idMensagem;
    private $nome;
    private $email;
    private $mensagem;

    public static function getMensagens() {
	$conn = DB::getConnection();
	
	$query = 'SELECT `idMensagem`, `nome`, `email`, `mensagem` FROM `Mensagem`';
	$result = $conn->query($query);
	if ($result === FALSE) {
	    throw new \Exception("Falha ao carregar lista de Mensagens. Erro: {$conn->error}");
	}
	
	$mensagens = [];
	while ($row = $result->fetch_assoc()) {
	    $mensagens[] = new Mensagem($row['idMensagem'], $row['nome'], $row['email'], $row['mensagem']);
	}
	
	$result->close();
	
	return $mensagens;
    }
    
    /**
     * 
     * @param Mensagem $msg
     * @return type
     * @throws \Exception
     */
    public static function insere($msg) {
	$conn = DB::getConnection();
	
	$query = 'INSERT INTO `Mensagem` (`nome`, `email`, `mensagem`) VALUES (?, ?, ?)';
	$stmt = $conn->prepare($query);
	if ($stmt === FALSE) {
	    throw new \Exception("Falha ao preparar query. Erro: {$conn->error}");
	}
	
	$nome = $msg->getNome();
	$email = $msg->getEmail();
	$mensagem = $msg->getMensagem();
	if ($stmt->bind_param('sss', $nome, $email, $mensagem) === FALSE) {
	    throw new \Exception("Falha ao associar parametros. Erro: {$stmt->error}");
	}
	
	if ($stmt->execute() === FALSE) {
	    throw new \Exception("Falha ao executar query. Erro: {$stmt->error}");
	}
	
	$stmt->close();
    }

    function getIdMensagem() {
	return $this->idMensagem;
    }

    function getNome() {
	return $this->nome;
    }

    function getEmail() {
	return $this->email;
    }

    function getMensagem() {
	return $this->mensagem;
    }

    function setIdMensagem($idMensagem) {
	$this->idMensagem = $idMensagem;
    }

    function setNome($nome) {
	$this->nome = $nome;
    }

    function setEmail($email) {
	$this->email = $email;
    }

    function setMensagem($mensagem) {
	$this->mensagem = $mensagem;
    }

    function __construct($idMensagem, $nome, $email, $mensagem) {
	$this->idMensagem = $idMensagem;
	$this->nome = $nome;
	$this->email = $email;
	$this->mensagem = $mensagem;
    }

}
