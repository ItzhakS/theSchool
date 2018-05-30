<?php

class Database extends PDO {

    function __construct() {
        parent::__construct("mysql:host=localhost;dbname=mesima_employees",
            Config::$user, Config::$password);
    }
    
    

}
