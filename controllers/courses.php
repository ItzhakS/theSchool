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
    $this->_view->rightContent = $result;
    $this->_view->render("leftContainer", "rightContainer");
  }

  private function Insert(){
    $this->_view->content = $this->_model->Insert();
    $this->_view->render('Employees/index');
}
private function Update(){
    $this->_view->content = $this->_model->Update();
    $this->_view->render('Employees/index');
}
private function Delete(){
    $this->_view->content = $this->_model->Delete();
    $this->_view->render('Employees/index');
}

  public function GetAll(){
    $this->_view->rightContent = '';
    $this->_view->leftContent = $this->_model->GetAll()->ToHTML();
    $this->_view->render('students/leftContainer','students/rightContainer');
  }
}
