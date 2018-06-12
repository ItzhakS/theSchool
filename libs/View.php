<?php

class View {

    function __construct() {
        $this->ID = '';
        $this->Name = '';
        $this->name = '';
        $this->role = '';
        $this->phone = '';
        $this->email = '';
        $this->password = '';
        $this->profile_image = '';
        $this->rightContent = '';
    }
    
    public function render($name1, $name2) {
        require_once "views/header.php" ;
        require_once "views/$name1.php" ;
        require_once "views/$name2.php" ;
        require_once "views/footer.php" ;
    }

}
