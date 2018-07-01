<?php

class TheSchool extends Controller {

    function __construct() {
        parent::__construct();
        parent::loadModel(__CLASS__);
        
    }
    public function index(){
        $studentsAmount = $this->_model->studentsCount();
        $coursesAmount =  $this->_model->coursesCount();
        $this->_view->studentsAmount = $studentsAmount[0]['COUNT(ID)'];
        $this->_view->coursesAmount = $coursesAmount[0]['COUNT(ID)'];
        $this->_view->render("leftSchoolContainer", "rightInfoContainer");
    }

    public function insertCourse(){
        $this->_view->render("leftSchoolContainer", "courses/rightCourseContainer");

    }

    public function insertStudent(){
        $this->_view->render("leftSchoolContainer", "students/rightStudentContainer");

    }
    

}