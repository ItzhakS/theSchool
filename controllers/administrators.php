<?php

class Administrators extends Controller{
  
  function __constructor(){
    parent::__constructor();
    parent::loadModel(__CLASS__);
  }

  public function Get($adminID){
    $result = $this->_model->Get();
    $this->_view->rightContent = $result;
    $this->_view->render("leftContainer", "rightContainer");
}

public function GetAll(){
    $this->_view->rightContent = '';
    $this->_view->leftContent = $this->_model->GetAll()->ToHTML();
    $this->_view->render('students/leftContainer','students/rightContainer');
}
}
