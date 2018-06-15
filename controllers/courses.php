<?php

class Courses extends Controller{
  
  function __construct(){
    parent::__construct();
    parent::loadModel(__CLASS__);
  }

  public function index(){
    

}

  public function Get($courseID){
    $result = $this->_model->Get($courseID);
    $this->_view->ID = $result['ID'];
    $this->_view->name = $result['name'];
    $this->_view->description = $result['description'];
    $this->_view->profile_image = $result['profile_image'] || "Nothing";
    $this->_view->render("leftSchoolContainer", "courses/rightCourseInfo");
  }

  public function EditCourse($courseID){
    $result = $this->_model->Get($courseID);
    $this->_view->ID = $result['ID'];
    $this->_view->name = $result['name'];
    $this->_view->description = $result['description'];
    $this->_view->profile_image = $result['profile_image'];
    $this->_view->render("leftSchoolContainer", "courses/rightCourseContainer");
  }


  private function Insert(){
    $this->_view->rightInfo= $this->_model->Insert();
    $this->_view->render("leftSchoolContainer", "rightInfoContainer");
  }

  private function Update(){
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
}
