<?php

class Students extends Controller {

    function __construct() {
        parent::__construct();
        parent::loadModel(__CLASS__);
        
    }
    
      public function Get(){
        $result = $this->_model->Get();
        $this->_view->rightContent = $result;
        $this->_view->render("leftContainer", "rightContainer");
    }
}

