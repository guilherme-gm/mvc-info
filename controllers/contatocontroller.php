<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

use Lib\Controller;
use Lib\Session;
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
		Session::setFlash('Todos os campos são obrigatórios.');
	    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
		Session::setFlash('Email inválido.');
	    } else {
		$msg = new Mensagem(0, $nome, $email, $mensagem);
		Mensagem::insere($msg);
		
		Session::setFlash('Mensagem enviada com sucesso.');
	    }
	}
    }
    
    public function admin_index() {
	$this->data['mensagens'] = Mensagem::getMensagens();
    }

}
