<?php

use Lib\Config;

Config::set('site_name', 'Jornal Info');

Config::set('languages', [ 'pt_br', 'en' ]);

Config::set('routes', [
    'default' => '',
    'admin' => 'admin_'
]);

Config::set('default_route', 'default');
Config::set('default_language', 'pt_br');
Config::set('default_controller', 'pagina');
Config::set('default_action', 'index');

// Definições de Banco de Dados
Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.password', 'vertrigo');
Config::set('db.name', 'infojornal');
