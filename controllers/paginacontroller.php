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
    
}
