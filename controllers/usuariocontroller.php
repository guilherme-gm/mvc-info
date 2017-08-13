<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

use Lib\App;
use Lib\Controller;
use Lib\Session;
use Lib\Router;
use Models\Usuario;

/**
 * Description of UsuarioController
 *
 * @author guilh
 */
class UsuarioController extends Controller {

    public function admin_login() {
	if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST') {
	    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
	    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	    
	    if ($login == FALSE || $senha == FALSE) {
		Session::setFlash('Todos os campos são obrigatórios.');
		Router::redirect(App::getRouter()->getUrl('usuario', 'login', [], 'admin'));
	    }
	    
	    $usuario = Usuario::getByLogin($login);
	    if ($usuario == NULL || password_verify($senha, $usuario->getSenha()) == FALSE) {
		Session::setFlash('Não foi possível encontrar um usuário com os dados informados.');
	    } else if ($usuario->getAtivo() == FALSE) {
		Session::setFlash('Usuário está desativado.');
	    } else {
		Session::set('usuario', $usuario);
	    }
	    
	    Router::redirect(App::getRouter()->getUrl('', '', [], 'admin'));
	}
    }
    
    public function admin_logout() {
	Session::destroy();
	Router::redirect(App::getRouter()->getUrl('', '', [], 'admin'));
    }

}
