<?php

class Login_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function authenticate() {
        $retValue = false;
        $login = $_POST['login'];
        $password = /*sha1(config::$salt_prefix . */$_POST['password']/* . config::$salt_suffix)*/;
        $sql = "SELECT role FROM administrators WHERE name=:name and password=:pswd";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":name", $login);
        $stmt->bindParam(":pswd", $password);
        $stmt->execute();
        $this->result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($this->result) {
            Session::set('role', $this->result['role']);
            Session::set('loggedIn' , true);
            $retValue = true;
        } else {
            $retValue = false;
        }
        return $retValue;
    }
}
