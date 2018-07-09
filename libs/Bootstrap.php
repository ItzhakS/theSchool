<?php

class Bootstrap {
    const CONTROLLER = 0 ;
    const ACTION = 1 ;
    const P1 = 2 ;
    const P2 = 3 ;
 
    private $_controller = null;
    private $_controllerObj = null;
    private $_action = null;
    private $_p1 = null;
    private $_p2 = null;

    function __construct() {
        
    }

    public function init() {
        $this->_parseParams();
        if ($this->_CreateController() == true) {
            $this->_execute();
        }
    }

    private function _parseParams() {
        if($_SESSION['loggedIn']){
            $uri = isset($_GET['uri']) ? $_GET['uri'] : 'theSchool/index';
        } else {
            $uri = isset($_GET['uri']) ? $_GET['uri'] : 'login/login';
        }
        $uri = rtrim($uri, '/');
        $uri = explode('/', $uri);
      
        $this->_controller = $uri[self::CONTROLLER ];
        $this->_action = isset($uri[self::ACTION]) ? $uri[self::ACTION] : 'index';
        $this->_p1 = isset($uri[self::P1]) ? $uri[self::P1] : null;
    }

    private function _CreateController() {
        $file = 'controllers/' . $this->_controller . '.php';
        if (file_exists($file)) {
            require_once $file; // 'controllers/' . $this->_controller . '.php';
            $this->_controllerObj = new $this->_controller;
            //$this->_controllerObj->loadModel($this->_controller);
        } else {
            return $this->_error($this->_controller . ' controller ');
        }

        return true;
    }

    private function _execute() {
        if ($this->_p1 && method_exists($this->_controllerObj, $this->_action)) {
            // $this->_controllerObj->a = $this->_p1;
            $this->_controllerObj->{$this->_action}($this->_p1);
            return;
        }

        if (method_exists($this->_controllerObj, $this->_action)) {
            $this->_controllerObj->{$this->_action}();
        }  
        else {
            $this->_error($this->_action . ' method ');
        }
    }

    private function _error($msg) {
//        require_once 'controllers/error.php';
//        $err = new APPError($msg . ' not found');
//        $err->index();
        return false;
    }

}
