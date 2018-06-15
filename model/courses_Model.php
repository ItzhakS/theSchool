<?php

Class Courses_Model extends Model {

  function __construct() {
    parent::__construct();
}

  public function Get($courseID = null){
    try {
        $sql = "SELECT * FROM `theschool`.`courses` WHERE ID = :courseID;";
        $stmt = $this->db->prepare($sql);
        if($courseID >= 0){
            $stmt->bindParam(':courseID', $courseID);
        } else {
            $stmt->bindParam(':courseID', $_POST['ID']);
        }
        $stmt->execute();
        $this->result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($this->result == NULL){
            throw new Exception('Course Not Found./n');
        } else{
        return $this->result;
        }
    } catch (Exception $ex){
        return $ex->getMessage();
    }
  }

  public function Insert(){
    try {
        $sql = "INSERT INTO `theschool`.`courses`(`name`,`description`, `profile_image`) VALUES(:name, :description, :profile_image);";
        if($_POST['name'] == "" || $_POST['description'] == ""){
            throw new Exception('Please Fill Out All Fields with a *');
        // } else if(preg_match('~[0-9]+~', $_POST['Name'])){
        //     throw new Exception('Do not add numbers to Students name.');
        }else{
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':ID', $_POST['ID']);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':profile_image', $_POST['profile_image']);
        $stmt->execute();
        }
        if($stmt->rowCount() == 0){
            throw new Exception('The Course was not added. Too Bad');
        } else{
        return 'Successfully added ne Course. Good Job. Go take a break.';
        }
    } catch (Exception $ex) {
        return $ex->getMessage();
    }   
  }

  public function Update(){
    try {
        $sql = "UPDATE `theschool`.`courses` SET `name` = :name,`description` = :description,`profile_image` = :profile_image WHERE `ID` = :ID;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':profile_image', $_POST['profile_image']);
        $stmt->execute();
        if ($_POST['name'] == "" || $_POST['description'] == ""){
            throw new Exception('Please Fill Out All Fields with a *');
        } else if($stmt->rowCount() == 0){
            throw new Exception('Update Unsuccessful.');
        } else{
        return "Successfully Updated the Course info";
        }
      } catch (Exception $ex) {
        return $ex->getMessage();
    }
  }

  public function Delete(){
    try {
        $sql = "DELETE FROM `theschool`.`students` WHERE ID = :ID;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':ID', $_POST['ID']);
        $stmt->execute();
        if ($stmt->rowCount() == 0){
            throw new Exception('Not Deleted. You can\'t catch me');
        } else{
        return "Course: ".$_POST['name'].' Deleted! HAHAHA!';
        }
      } catch (Exception $ex) {
        return $ex->getMessage();
    }
  }

  public function GetAll(){
    $sql = "SELECT * FROM `theschool`.`courses`;";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $this;
  }

  public function ToHTML(){
    $data = $this->result;
    $list ="<ul class='courseList'>";
    foreach ($data as $key => $value) {
        $list .="<li class='courseListItem'>";
        $list .="<div class='listItemWrapper'>";
        $list .="<a href='http://127.0.0.1/theschool/Courses/Get/$value[ID]' target='_self'>";
        $list .="<div>$value[ID]</div>";
        $list .="<div>$value[name]</div>";
        $list .="<div>$value[description]</div>";
        $list .="<div>$value[image]</div>";
        $list .="</a>";
        $list .="</div>";
        $list .="</li>";
    }
    $list .="</ul>";
    return $list;
  }

}
