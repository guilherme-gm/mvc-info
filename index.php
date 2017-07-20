<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

use Lib\Router;

require_once ROOT . DS . 'lib' . DS . 'init.php';

$router = new Router();
echo "Route: {$router->getRoute()} <br/>"
 . "Prefix: {$router->getMethodPrefix()}<br/>"
 . "Controller: {$router->getController()}<br />"
 . "Action: {$router->getAction()}<br />"
 . "Language: {$router->getLanguage()}";
