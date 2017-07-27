<?php

namespace Controllers;

use Lib\Controller;
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
    
    public function ver() {
	$idPagina = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	if ($idPagina != FALSE) {
	    $this->data['pagina'] = Pagina::getPaginaPorId($idPagina);
	}
    }
    
    public function admin_index() {
	$this->data['paginas'] = Pagina::getPaginas();
    }
    
    public function admin_nova() {
	
    }
    
    public function admin_editar() {
	
    }
    
    public function admin_excluir() {
	
    }
    
}
