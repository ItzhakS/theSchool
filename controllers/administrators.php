<?php

class Administrators extends Controller{
  
  function __construct(){
    parent::__construct();
    parent::loadModel(__CLASS__);
  }

  public function Get($adminID = null){
    $result = $this->_model->Get($adminID);
    $this->_view->rightContent = $result;
    $this->_view->render("leftContainer", "rightContainer");
}

  public function GetAll(){
    $this->_view->rightContent = '';
    $this->_view->leftContent = $this->_model->GetAll()->ToHTML();
    $this->_view->render('students/leftContainer','students/rightContainer');
}
}
