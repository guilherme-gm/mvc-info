<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lib;

use Lib\DB;

/**
 * Description of Model
 *
 * @author guilh
 */
class Model {
    
    /**
     *
     * @var DB
     */
    protected static $db;
    
    public static function init() {
	self::$db = App::getDb();
    }
    
    public function __construct() {
	
    }
    
}
Model::init();