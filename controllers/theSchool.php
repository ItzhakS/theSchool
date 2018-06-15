<?php

class TheSchool extends Controller {

    function __construct() {
        parent::__construct();
        parent::loadModel(__CLASS__);
        
    }
    public function index(){
        $this->_view->rightInfo = "This is the Important Info";
        $this->_view->render("leftSchoolContainer", "rightInfoContainer");
    }

    public function insertCourse(){
        $this->_view->render("leftSchoolContainer", "rightCourseContainer");

    }

    public function insertStudent(){
        $this->_view->render("leftSchoolContainer", "rightStudentContainer");

    }
    

}