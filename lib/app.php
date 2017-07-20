<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lib;

use Lib\Router;

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

    static function getRouter() {
	return self::$router;
    }

    public static function run() {
	self::$router = new Router();

	$controller_class = 'Controllers\\' . ucfirst(self::$router->getController()) . 'Controller';
	$controller_method = strtolower(self::$router->getMethodPrefix() . self::$router->getAction());

	// Chama o controller
	$controller = new $controller_class();
	if (method_exists($controller, $controller_method)) {
	    $controller->$controller_method();
	} else {
	    throw new \Exception("Método {$controller_method} da classe {$controller_class} não existe.");
	}
    }

}
