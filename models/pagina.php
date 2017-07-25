<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

use Lib\Model;

/**
 * Description of Pagina
 *
 * @author guilh
 */
class Pagina extends Model {

    private $idPagina;
    private $titulo;
    private $conteudo;
    private $publicado;

    //private $autor;

    public static function getPaginas($apenasPublicado = false) {
	$conn = self::$db->getConnection();
	
	if ($apenasPublicado == FALSE) {
	    $query = 'SELECT `idPagina`, `titulo`, `conteudo`, `publicado` FROM `Pagina`';
	} else {
	    $query = 'SELECT `idPagina`, `titulo`, `conteudo`, `publicado` FROM `Pagina` WHERE `publicado` = 1';
	}
	$result = $conn->query($query);
	if ($result === FALSE) {
	    throw new \Exception("Falha ao carregar lista de Páginas. Erro: {$conn->error}");
	}
	
	$paginas = [];
	while ($row = $result->fetch_assoc()) {
	    $paginas[] = new Pagina($row['idPagina'], $row['titulo'], $row['conteudo'], $row['publicado']);
	}
	
	$result->close();
	
	return $paginas;
    }
    
    public static function getPaginaPorId($idPagina) {
	$conn = self::$db->getConnection();
	
	$query = 'SELECT `idPagina`, `titulo`, `conteudo`, `publicado` FROM `Pagina` WHERE `idPagina` = ?';
	$stmt = $conn->prepare($query);
	if ($stmt === FALSE) {
	    throw new \Exception("Falha ao preparar query. Erro: {$conn->error}");
	}
	
	if ($stmt->bind_param('i', $idPagina) === FALSE) {
	    throw new \Exception("Falha ao associar parametros. Erro: {$stmt->error}");
	}
	
	if ($stmt->execute() === FALSE) {
	    throw new \Exception("Falha ao executar query. Erro: {$stmt->error}");
	}
	
	$result = $stmt->get_result();
	if ($row = $result->fetch_assoc()) {
	    $pagina = new Pagina($row['idPagina'], $row['titulo'], $row['conteudo'], $row['publicado']);
	} else {
	    $pagina = NULL;
	}
	
	$result->close();
	$stmt->close();
	
	return $pagina;
    }

    function getIdPagina() {
	return $this->idPagina;
    }

    function getTitulo() {
	return $this->titulo;
    }

    function getConteudo() {
	return $this->conteudo;
    }

    function getPublicado() {
	return $this->publicado;
    }

    function setIdPagina($idPagina) {
	$this->idPagina = $idPagina;
    }

    function setTitulo($titulo) {
	$this->titulo = $titulo;
    }

    function setConteudo($conteudo) {
	$this->conteudo = $conteudo;
    }

    function setPublicado($publicado) {
	$this->publicado = $publicado;
    }

    function __construct($idPagina, $titulo, $conteudo, $publicado) {
	$this->idPagina = $idPagina;
	$this->titulo = $titulo;
	$this->conteudo = $conteudo;
	$this->publicado = $publicado;
    }

}