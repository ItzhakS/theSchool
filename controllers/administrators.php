<?php

class Administrators extends Controller{
  
  function __construct(){
    parent::__construct();
    parent::loadModel(__CLASS__);
  }

  public function index($info = false){
    if($info){
      $this->_view->render('administrators/leftContainer','administrators/rightInfoContainer');
    } else {
      $Action = $_POST['ACTION'];
      $this->{$Action}();
    }
  }

  public function Get($adminID = null){
    $result = $this->_model->Get($adminID);
    $this->_view->ID = $result['ID'];
    $this->_view->name = $result['name'];
    $this->_view->role = $result['role'];
    $this->_view->phone = $result['phone'];
    $this->_view->email = $result['email'];
    $this->_view->password = $result['password'];
    // $this->_view->leftContent = $this->GetAll();    
    // $this->_view->profile_image = $result['profile-image'];
    // $this->_view->rightContent = '';
    $this->_view->render('administrators/leftContainer','administrators/rightAdminInfo');
}

  public function EditAdmin($adminID){
    $result = $this->_model->Get($adminID);
    $this->_view->ID = $result['ID'];
    $this->_view->name = $result['name'];
    $this->_view->role = $result['role'];
    $this->_view->phone = $result['phone'];
    $this->_view->email = $result['email'];
    $this->_view->profile_image = $result['profile_image'];
    $this->_view->render("administrators/leftContainer','administrators/rightEditContainer");
  }


  private function Insert(){
    $this->_model->Insert();
    $this->_view->leftContent = $this->GetAll();
    $this->_view->render('administrators/leftContainer','administrators/rightInfoContainer');
  }

  private function insertAdmin(){
    $this->_view->render('administrators/leftContainer','administrators/rightContainer');
  }

  private function Update(){
    $this->_view->rightContent = $this->_model->Update();;
    $this->_view->leftContent = $this->GetAll();
    $this->_view->render('administrators/leftContainer','administrators/rightInfoContainer');
  }
  private function Delete(){
    $this->_view->rightContent = $this->_model->Delete();
    $this->_view->leftContent = $this->GetAll();
    $this->_view->render('administrators/leftContainer','administrators/rightInfoContainer');
  }

  public function GetAll(){
    return $this->_model->GetAll()->ToHTML();
  }

  public function displayInfo(){
    $adminInfo = $this->_model->adminCount();
    return $adminInfo[0]['COUNT(ID)'];
  }
}
