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
        $sql = "INSERT INTO `theschool`.`students`(`ID`,`Name`,`phone`, `email`, `profile_image`) VALUES(:ID,:Name,:phone, :email, :profile_image);";
        if($_POST['ID'] == "" || $_POST['Name'] == "" || $_POST['phone'] == "" || $_POST['email'] == ""){
            throw new Exception('Please Fill Out All Fields with a *');
        } else if($_POST['ID'] == "0" ){
            throw new Exception('ID Cannot be zero');
        } else if(preg_match('~[0-9]+~', $_POST['Name'])){
            throw new Exception('Do not add numbers to Students name.');
        }else{
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':ID', $_POST['ID']);
        $stmt->bindParam(':Name', $_POST['Name']);
        $stmt->bindParam(':phone', $_POST['phone']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':profile_image', $_POST['profile_image']);
        $stmt->execute();
        }
        if($stmt->rowCount() == 0){
            throw new Exception('Student ID already exists, please change the ID.');
        } else{
        return 'Successfully inserted new student. Good Job. Go take a break.';
        }
    } catch (Exception $ex) {
        return $ex->getMessage();
    }   
  }

  public function Update(){
    try {
        $sql = "UPDATE `theschool`.`students` SET `Name` = :Name,`phone` = :phone, `email` = :email,`profile_image` = :profile_image WHERE `ID` = :ID;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':ID', $_POST['ID']);
        $stmt->bindParam(':Name', $_POST['Name']);
        $stmt->bindParam(':phone', $_POST['phone']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':profile_image', $_POST['profile_image']);
        $stmt->execute();
        if ($stmt->rowCount() == 0){
            throw new Exception('No Student affected.');
        } else if($_POST['Name'] == "" || $_POST['phone'] == "" || $_POST['email'] == ""){
            throw new Exception('Please Fill Out All Fields with a *');
        } else{
        return "Successfully Updated the students info";
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
            throw new Exception('No Student found.');
        } else{
        return "Student: ".$_POST['Name'].' Deleted!';
        }
      } catch (Exception $ex) {
        return $ex->getMessage();
    }
  }

  public function GetAll(){
    $sql = "SELECT * FROM `theschool`.`students`;";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $this;
  }

  public function ToHTML(){
    $data = $this->result;
    $table= "<ul class='courseList'>";
    foreach ($data as $key => $value) {
        $table .="<li class='courseListItem>";
        $table .= "<div class='listItemWrapper'>";
        $table .= "<a href='../Courses/Get/$value[ID]' target='_self'>";
        $table .= "<div>$value[ID]</div>";
        $table .= "<div>$value[Name]</div>";
        $table .="<div>$value[description]</div>";
        $table .="<div>$value[image]</div>";
        $table .= "</a>";
        $table .= "</div>";
        $table .= "</li>";
    }
    $table .= "</ul>";
    return $table;
  }

}
