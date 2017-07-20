<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

use Lib\App;

require_once ROOT . DS . 'lib' . DS . 'init.php';

try {
    App::run();
} catch (Exception $ex) {
    echo "Erro inesperado: {$ex->getMessage()}";
}
