<?php

namespace Controllers;

use Lib\Controller;
use Lib\Session;
use Lib\Router;
use Lib\App;
use Models\Pagina;

/**
 * Description of PaginaController
 *
 * @author guilh
 */
class PaginaController extends Controller {

    public function index() {
	$this->data['paginas'] = Pagina::getPaginas(true);
    }

    public function ver($idPagina) {
	$idPagina = filter_var($idPagina, FILTER_SANITIZE_NUMBER_INT);
	if ($idPagina != FALSE) {
	    $this->data['pagina'] = Pagina::getPaginaPorId($idPagina);
	}
    }

    public function admin_index() {
	$this->data['paginas'] = Pagina::getPaginas();
    }

    public function admin_nova() {
	if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
	    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
	    $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_STRING);
	    $publicado = filter_input(INPUT_POST, 'publicado') ? 1 : 0;

	    if ($titulo == FALSE || $conteudo == FALSE) {
		Session::setFlash('Todos os campos são obrigatórios');
		Router::redirect(App::getRouter()->getUrl('pagina', 'nova'));
	    }

	    $usuario = Session::get('usuario');
	    $pagina = new Pagina(0, $titulo, $conteudo, $publicado, $usuario);
	    Pagina::inserir($pagina);

	    Session::flash('Página criada com sucesso.');
	    Router::redirect(App::getRouter()->getUrl('pagina'));
	}
    }

    public function admin_editar($id) {
	$request = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
	if ($request === 'POST') {
	    $idPagina = filter_input(INPUT_POST, 'idPagina', FILTER_SANITIZE_NUMBER_INT);
	    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
	    $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_STRING);
	    $publicado = filter_input(INPUT_POST, 'publicado') ? 1 : 0;

	    if ($idPagina == FALSE || $idPagina <= 0) {
		Session::setFlash('Página não encontrada');
		Router::redirect(App::getRouter()->getUrl('pagina'));
	    } else if ($titulo == FALSE || $conteudo == FALSE) {
		Session::setFlash('Todos os campos são obrigatórios');
		Router::redirect(App::getRouter()->getUrl('pagina', 'editar', [$idPagina]));
	    }

	    $usuario = Session::get('usuario');
	    $pagina = new Pagina($idPagina, $titulo, $conteudo, $publicado, $usuario);
	    Pagina::atualizar($pagina);

	    Session::flash('Página atualizada com sucesso.');
	    Router::redirect(App::getRouter()->getUrl('pagina'));
	} else if ($request === 'GET') {
	    $idPagina = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

	    if ($idPagina == FALSE || $idPagina < 0) {
		Session::setFlash('Página não encontrada');
		Router::redirect(App::getRouter()->getUrl('pagina'));
	    }

	    $this->data['pagina'] = Pagina::getPaginaPorId($idPagina);
	}
    }

    public function admin_excluir($id) {
	$idPagina = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

	if ($idPagina == FALSE || $idPagina < 0) {
	    Session::setFlash('Página não encontrada');
	    Router::redirect(App::getRouter()->getUrl('pagina'));
	}

	Pagina::excluir($idPagina);
	Session::setFlash('Página excluída com sucesso.');
	Router::redirect(App::getRouter()->getUrl('pagina'));
    }

}
