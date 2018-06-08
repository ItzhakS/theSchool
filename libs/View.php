<?php

class View {

    function __construct() {
        
    }
    
    public function render($name1, $name2) {
        require_once "views/header.php" ;
        require_once "views/$name1.php" ;
        require_once "views/$name2.php" ;
        require_once "views/footer.php" ;
    }

}
