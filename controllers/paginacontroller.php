<?php

namespace Controllers;

use Lib\Controller;

/**
 * Description of PaginaController
 *
 * @author guilh
 */
class PaginaController extends Controller {
    
    public function index() {
	echo 'Aqui vai ter a lista de posts';
    }
    
    public function ver() {
	$idPagina = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	if ($idPagina != FALSE) {
	    echo "Aqui vamos mostrar a página de id = {$idPagina}";
	}
    }
    
}
