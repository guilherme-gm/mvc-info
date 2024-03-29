<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lib;

use Lib\Router;
use Lib\View;
use Lib\Lang;
use Lib\DB;

/**
 * Description of App
 *
 * @author guilh
 */
class App {

    /**
     *
     * @var Router
     */
    protected static $router;

    /**
     *
     * @return Router
     */
    static function getRouter() {
	return self::$router;
    }

    static function getDb() {
	return self::$db;
    }

    public static function run() {
	self::$router = new Router();

	Lang::load(self::$router->getLanguage());

	$controller_class = 'Controllers\\' . ucfirst(self::$router->getController()) . 'Controller';
	$controller_method = strtolower(self::$router->getMethodPrefix() . self::$router->getAction());

	$layout = self::$router->getRoute();
	if ($layout == 'admin' &&
		(Session::get('usuario') == NULL || Session::get('usuario')->getCargo() != 'admin')
	) {
	    if ($controller_method != 'admin_login') {
		Router::redirect(self::$router->getUrl('usuario', 'login', [], 'admin'));
	    }
	}

	// Chama o controller
	$controller = new $controller_class();
	if (method_exists($controller, $controller_method)) {
	    $view_path = $controller->$controller_method(...self::$router->getParams());
	    $view_object = new View($controller->getData(), $view_path);
	    $content = $view_object->render();
	} else {
	    throw new \Exception("Método {$controller_method} da classe {$controller_class} não existe.");
	}


	$layout_path = VIEW_PATH . DS . $layout . '.php';
	$layout_view_object = new View(compact('content'), $layout_path);
	echo $layout_view_object->render();
    }

}
