<?php

class TheSchool extends Controller {

    function __construct() {
        parent::__construct();
        parent::loadModel(__CLASS__);
        
    }
    public function index(){
        $this->_view->render("leftSchoolContainer", "rightStudentContainer");
    }
    

}