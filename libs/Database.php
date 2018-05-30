<?php

class Database extends PDO {

    function __construct() {
        parent::__construct("mysql:host=localhost;dbname=theschool",
            Config::$user, Config::$password);
    }
    
    

}
