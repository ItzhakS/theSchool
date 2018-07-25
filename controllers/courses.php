<?php

class Courses extends Controller{
  
  function __construct(){
    parent::__construct();
    parent::loadModel(__CLASS__);
  }

  public function index(){
    $Action = $_POST['ACTION'];
    $this->{$Action}();
}

  public function Get($courseID){
    $result = $this->_model->Get($courseID);
    $this->_view->ID = $result['ID'];
    $this->_view->name = $result['name'];
    $this->_view->description = $result['description'];
    $this->_view->profile_image = $result['image'];
    $this->_view->render("leftSchoolContainer", "courses/rightCourseInfo");
  }

  public function showAllStudents($ID){
    return $this->_model->showAllStudents($ID);
  }

  public function EditCourse($courseID){
    $result = $this->_model->Get($courseID);
    $this->_view->ID = $result['ID'];
    $this->_view->name = $result['name'];
    $this->_view->description = $result['description'];
    $this->_view->profile_image = $result['image'];
    $this->_view->render("leftSchoolContainer", "courses/rightCourseContainer");
  }


  private function Insert(){
    $this->uploadFile();
    $this->_view->rightInfo = $this->_model->Insert();
    $this->_view->render("leftSchoolContainer", "rightInfoContainer");
  }

  private function Update(){
    $this->uploadFile();
      $this->_view->rightInfo= $this->_model->Update();
      $this->_view->render("leftSchoolContainer", "rightInfoContainer");
  }

  private function Delete(){
      $this->_view->rightInfo= $this->_model->Delete();
      $this->_view->render("leftSchoolContainer", "rightInfoContainer");
  }

  public function GetAll(){
    return $this->_model->GetAll()->ToHTML();
    // $this->_view->rightContent = '';
    // $this->_view->leftContent = $this->_model->GetAll()->ToHTML();
    // $this->_view->render('students/leftContainer','students/rightContainer');
  }
  public function GetAllCourses(){
    return $this->_model->GetAll(true);
  }
}
