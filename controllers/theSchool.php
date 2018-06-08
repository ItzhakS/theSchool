<?php

class TheSchool extends Controller {

    function __construct() {
        parent::__construct();
        parent::loadModel(__CLASS__);
        
    }
    public function index(){
        $this->_view->leftContent = "<h1> Courses</h1>";
        $this->_view->rightContent = '<p>Lorem ipsum ;jhndn jnbouBAD  ;KJb k hid hk ia ibhaduofh kjhduofh thia haf to tbe th</p>';
        $this->_view->render("leftContainer", "rightContainer");
    }
    

}