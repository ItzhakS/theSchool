<?php

class Students extends Controller {

    function __construct() {
        parent::__construct();
        parent::loadModel(__CLASS__);
    }

    public function index(){
        $Action = $_POST['ACTION'];
        $this->{$Action}();
    
    }
    
    public function Get($studentID){
        $result = $this->_model->Get($studentID);
        $this->_view->ID = $result['ID'];
        $this->_view->Name = $result['Name'];
        $this->_view->phone = $result['phone'];
        $this->_view->email = $result['email'];
        $this->_view->profile_image = $result['profile_image'];
        $this->_view->render("leftSchoolContainer", "students/rightStudentInfo");
    }

    public function GetStudentsCourses($id){
        return $this->_model->GetStudentsCourses($id);
    }

    public function EditStudent($studentID){
        $result = $this->_model->Get($studentID);
        $this->_view->ID = $result['ID'];
        $this->_view->Name = $result['Name'];
        $this->_view->phone = $result['phone'];
        $this->_view->email = $result['email'];
        $this->_view->profile_image = $result['profile_image'];
        $this->_view->render("leftSchoolContainer", "students/rightStudentcontainer");
    }

    private function Insert(){
        $this->_view->rightInfo = $this->_model->Insert();
        $this->_view->render("leftSchoolContainer", "rightInfoContainer");
    }
    private function Update(){
        $this->_view->message = $this->_model->Update();
        $this->_view->render("leftSchoolContainer", "rightInfoContainer");
    }
    private function Delete(){
        $this->_view->rightInfo = $this->_model->Delete();
        $this->_view->render("leftSchoolContainer", "rightInfoContainer");
    }
    
    public function GetAll(){
        return $this->_model->GetAll()->ToHTML();
        // $this->_view->rightContent = '';
        // $this->_view->leftContent = $this->_model->GetAll()->ToHTML();
        // $this->_view->render('students/leftContainer','students/rightContainer');
        /*
        TheSchool::_view->ID = '';
        TheSchool::_view->name = '';
        TheSchool::_view->phone = '';
        TheSchool::_view->email = '';
        TheSchool::_view->profile_image = '';
        TheSchool::_view->rightContent = '';
        */
    }
    
    
}

