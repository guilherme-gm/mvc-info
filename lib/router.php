<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lib;

/**
 * Description of Router
 *
 * @author guilh
 */
class Router {

    protected $controller;
    protected $action;
    protected $route;
    protected $methodPrefix;
    protected $language;

    function getController() {
	return $this->controller;
    }

    function getAction() {
	return $this->action;
    }

    function getRoute() {
	return $this->route;
    }

    function getMethodPrefix() {
	return $this->methodPrefix;
    }

    function getLanguage() {
	return $this->language;
    }

    function setController($controller) {
	$this->controller = $controller;
    }

    function setAction($action) {
	$this->action = $action;
    }

    function setRoute($route) {
	$this->route = $route;
    }

    function setMethodPrefix($methodPrefix) {
	$this->methodPrefix = $methodPrefix;
    }

    function setLanguage($language) {
	$this->language = $language;
    }

    function __construct() {
	// Carrega Padrões
	$routes = Config::get('routes');
	
	$this->route = Config::get('default_route');
	$this->methodPrefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
	$this->controller = Config::get('default_controller');
	$this->action = Config::get('default_action');
	$this->language = Config::get('default_language');
    }

}
