<?php

class View {

    function __construct() {
        $this->ID = '';
        $this->Name = '';
        $this->name = '';
        $this->role = '';
        $this->phone = '';
        $this->email = '';
        $this->description = '';
        $this->password = '';
        $this->profile_image = '';
        $this->rightContent = '';
        $this->courseInfo = '';
        $this->studentInfo = '';
        $this->message = '';
    }
    
    public function render($name1, $name2) {
        if ($name1 && $name2){
            require_once "views/header.php" ;
            require_once "views/$name1.php" ;
            require_once "views/$name2.php" ;
            require_once "views/footer.php" ;
        } else if($name2 == ''){
            require_once "views/header.php" ;
            require_once "views/$name1.php" ;
            require_once "views/footer.php" ;
        }
    }

}
