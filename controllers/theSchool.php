<?php

class TheSchool extends Controller {

    function __construct() {
        parent::__construct();
        parent::loadModel(__CLASS__);
        
    }
    public function index(){
        $this->_view->messsage = "";
        $this->_view->render("leftSchoolContainer", "rightInfoContainer");
    }

    public function studentCount(){
        $studentsAmount = $this->_model->studentsCount();
        return $studentsAmount[0]['COUNT(ID)'];
        
    }
    public function courseCount(){
        $coursesAmount =  $this->_model->coursesCount();
        return $coursesAmount[0]['COUNT(ID)'];
        
    }

    public function insertCourse(){
        $this->_view->render("leftSchoolContainer", "courses/rightCourseContainer");

    }

    public function insertStudent(){
        $this->_view->render("leftSchoolContainer", "students/rightStudentContainer");

    }
    

}