<?php

class Students extends Controller {

    function __construct() {
        parent::__construct();
        parent::loadModel(__CLASS__);
    }

    public function index(){
        $this->_view->leftContent = "<h1> Courses</h1>";
        $this->_view->rightContent = '<p>Lorem ipsum ;jhndn jnbouBAD  ;KJb k hid hk ia ibhaduofh kjhduofh thia haf to tbe th</p>';
        $this->_view->render("leftContainer", "rightContainer");
    }

    public function crud(){
        if($this->a){
            $this->Get($this->a);
        } else{
        $Action = $_POST['ACTION'];
        $Action = str_replace(' ', '', $Action);
        $this->{$Action}();
        }
    }
    
    public function Get($studentID){
        $result = $this->_model->Get($studentID);
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
        return $this->_model->GetAll()->ToHTML();
        // $this->_view->rightContent = '';
        // $this->_view->leftContent = $this->_model->GetAll()->ToHTML();
        // $this->_view->render('students/leftContainer','students/rightContainer');
    }
    
    
}

