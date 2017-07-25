<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

use Lib\Controller;
use Models\Mensagem;

/**
 * Description of ContatoController
 *
 * @author guilh
 */
class ContatoController extends Controller {
    
    public function index() {
	if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === "POST") {
	    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
	    
	    if ($nome == FALSE || $email == FALSE || $mensagem == FALSE) {
		die('Todos os campos são obrigatórios.');
	    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
		die('Email inválido.');
	    }
	    
	    $msg = new Mensagem(0, $nome, $email, $mensagem);
	    Mensagem::insere($msg);
	}
    }
    
}
