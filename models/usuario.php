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
 * Description of Usuario
 *
 * @author guilh
 */
class Usuario extends Model {

    private $idUsuario;
    private $nome;
    private $usuario;
    private $senha;
    private $cargo;
    private $ativo;

    public static function getByLogin($login) {
	$conn = DB::getConnection();
	
	$query = 'SELECT `idUsuario`, `nome`, `usuario`, `senha`, `cargo`, `ativo` FROM `Usuario` WHERE `usuario` = ?';
	$stmt = $conn->prepare($query);
	if ($stmt === FALSE) {
	    throw new \Exception("Falha ao preparar query. Erro: {$conn->error}");
	}
	
	if ($stmt->bind_param('s', $login) === FALSE) {
	    throw new \Exception("Falha ao associar parametros. Erro: {$stmt->error}");
	}
	
	if ($stmt->execute() === FALSE) {
	    throw new \Exception("Falha ao executar query. Erro: {$stmt->error}");
	}
	
	$result = $stmt->get_result();
	if ($row = $result->fetch_assoc()) {
	    $usuario = new Usuario($row['idUsuario'], $row['nome'], $row['usuario'], $row['senha'], $row['cargo'], $row['ativo']);
	} else {
	    $usuario = NULL;
	}
	
	$result->close();
	$stmt->close();
	
	return $usuario;
    }
    
    public static function getById($id) {
	$conn = DB::getConnection();
	
	$query = 'SELECT `idUsuario`, `nome`, `usuario`, `senha`, `cargo`, `ativo` FROM `Usuario` WHERE `idUsuario` = ?';
	$stmt = $conn->prepare($query);
	if ($stmt === FALSE) {
	    throw new \Exception("Falha ao preparar query. Erro: {$conn->error}");
	}
	
	if ($stmt->bind_param('i', $id) === FALSE) {
	    throw new \Exception("Falha ao associar parametros. Erro: {$stmt->error}");
	}
	
	if ($stmt->execute() === FALSE) {
	    throw new \Exception("Falha ao executar query. Erro: {$stmt->error}");
	}
	
	$result = $stmt->get_result();
	if ($row = $result->fetch_assoc()) {
	    $usuario = new Usuario($row['idUsuario'], $row['nome'], $row['usuario'], $row['senha'], $row['cargo'], $row['ativo']);
	} else {
	    $usuario = NULL;
	}
	
	$result->close();
	$stmt->close();
	
	return $usuario;
    }

    function getIdUsuario() {
	return $this->idUsuario;
    }

    function getNome() {
	return $this->nome;
    }

    function getUsuario() {
	return $this->usuario;
    }

    function getSenha() {
	return $this->senha;
    }

    function getCargo() {
	return $this->cargo;
    }

    function getAtivo() {
	return $this->ativo;
    }

    function setIdUsuario($idUsuario) {
	$this->idUsuario = $idUsuario;
    }

    function setNome($nome) {
	$this->nome = $nome;
    }

    function setUsuario($usuario) {
	$this->usuario = $usuario;
    }

    function setSenha($senha) {
	$this->senha = $senha;
    }

    function setCargo($cargo) {
	$this->cargo = $cargo;
    }

    function setAtivo($ativo) {
	$this->ativo = $ativo;
    }

    function __construct($idUsuario, $nome, $usuario, $senha, $cargo, $ativo) {
	$this->idUsuario = $idUsuario;
	$this->nome = $nome;
	$this->usuario = $usuario;
	$this->senha = $senha;
	$this->cargo = $cargo;
	$this->ativo = $ativo;
    }

}
