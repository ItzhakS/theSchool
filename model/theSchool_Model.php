<?php

class TheSchool_Model extends Model{
  
  function __construct() {
    parent::__construct();
  }

  public function studentsCount(){
    // try {
        $sql = "SELECT COUNT(ID) FROM `theschool`.`students`;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;
    }

  public function coursesCount(){
    // try {
        $sql = "SELECT COUNT(ID) FROM `theschool`.`courses`;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;
    }
}
