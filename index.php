<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('VIEW_PATH', ROOT . DS . 'views');
use Lib\App;

session_start();

require_once ROOT . DS . 'lib' . DS . 'init.php';

try {
    App::run();
} catch (Exception $ex) {
    echo "Erro inesperado: {$ex->getMessage()}";
}

//$db = App::getDb();
//$con = $db->getConnection();
//$res = $con->query('SELECT * FROM Pagina');
//while ($row = $res->fetch_assoc()) {
//    var_dump($row);
//}