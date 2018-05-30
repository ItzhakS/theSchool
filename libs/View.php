<?php

class View {

    function __construct() {
        $this->EmpID = '';
        $this->EmpName = '';
        $this->EmpHireDate = '';
    }
    
    public function render($name) {
        require_once "views/header.php" ;
        require_once "views/$name.php" ;
        require_once "views/footer.php" ;
    }

}
