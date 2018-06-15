<?php

class Administrators extends Controller{
  
  function __construct(){
    parent::__construct();
    parent::loadModel(__CLASS__);
  }

  public function index(){
    $Action = $_POST['ACTION'];
    // $Action = str_replace(' ', '', $Action);
    $this->{$Action}();

  }

  public function Get($adminID = null){
    $result = $this->_model->Get($adminID);
    $this->_view->ID = $result['ID'];
    $this->_view->name = $result['name'];
    $this->_view->role = $result['role'];
    $this->_view->phone = $result['phone'];
    $this->_view->email = $result['email'];
    $this->_view->password = $result['password'];
    $this->_view->leftContent = $this->GetAll();    
    // $this->_view->profile_image = $result['profile-image'];
    $this->_view->rightContent = '';
    // $this->_view->render('administrators/leftContainer','administrators/rightContainer');
}

  private function Insert(){
    $this->_model->Insert();
    $this->_view->leftContent = $this->GetAll();
    $this->_view->render('administrators/leftContainer','administrators/rightContainer');
  }
  private function Update(){
    $this->_view->rightContent = $this->_model->Update();;
    $this->_view->leftContent = $this->GetAll();
    $this->_view->render('administrators/leftContainer','administrators/rightContainer');
  }
  private function Delete(){
    $this->_view->rightContent = $this->_model->Delete();
    $this->_view->leftContent = $this->GetAll();
    $this->_view->render('administrators/leftContainer','administrators/rightContainer');
  }

  public function GetAll(){
    // $this->_view->ID = '';
    // $this->_view->name = '';
    // $this->_view->role = '';
    // $this->_view->phone = '';
    // $this->_view->email = '';
    // $this->_view->password = '';
    // $this->_view->profile_image = '';
    // $this->_view->rightContent = '';
    $this->_view->leftContent = $this->_model->GetAll()->ToHTML();
    $this->_view->render('administrators/leftContainer','administrators/rightContainer');
}
}
