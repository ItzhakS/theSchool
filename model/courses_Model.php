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

  
  public function showAllStudents($ID){
    $sql = "SELECT `students`.* FROM STUDENTS where `students`.`ID` in (select link_students_courses.`studentID` from link_students_courses where link_students_courses.`courseID` = :courseID);";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':courseID', $ID);
    $stmt->execute();
    $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $this->result;
  }

  public function Insert(){
    try {
        $sql = "INSERT INTO `theschool`.`courses`(`name`,`description`, `image`) VALUES (:name, :description, :image);";
        if($_POST['name'] == "" || $_POST['description'] == ""){
            throw new Exception('Please Fill Out All Fields with a *');
        // } else if(preg_match('~[0-9]+~', $_POST['Name'])){
        //     throw new Exception('Do not add numbers to Students name.');
        }else{
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':description', $_POST['description']);
            $filePath = "http://localhost/theschool/uploads/";
            if ( $_FILES['profile_image']['name'] == ''){
                $filePath .= 'default-course.png';
                $stmt->bindParam(':image', $filePath);
            } else{
                $fileName = $_FILES["profile_image"]["name"];
                $filePath .= $fileName;
                $stmt->bindParam(':image', $filePath);
            }
            $stmt->execute();
        }
        if($stmt->rowCount() == 0){
            throw new Exception('The Course was not added. Too Bad');
        } else{
            return 'Successfully added new Course. Good Job. Go take a break.';
        }
    } catch (Exception $ex) {
        return $ex->getMessage();
    }   
  }

  public function Update(){
    try {
        $sql = "UPDATE `theschool`.`courses` SET `name` = :name,`description` = :description,`image` = :image WHERE `ID` = :ID;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':ID', $_POST['ID']);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':description', $_POST['description']);
        $filePath = "http://localhost/theschool/uploads/";
        if ( $_FILES['profile_image']['name'] == ''){
            $filePath .= 'default-course.jpg';
            $stmt->bindParam(':image', $filePath);
        } else{
            $fileName = $_FILES["profile_image"]["name"];
            $filePath .= $fileName;
            $stmt->bindParam(':image', $filePath);
        }
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
        $sql = "DELETE FROM `theschool`.`courses` WHERE ID = :ID;";
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

  public function GetAll($forCheckboxes = false){
    $sql = "SELECT * FROM `theschool`.`courses`;";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($forCheckboxes){
        return $this->result;
    }
    return $this;
  }

  public function ToHTML(){
    $data = $this->result;
    $list ="<ul class='courseList'>";
    foreach ($data as $key => $value) {
        $list .="<li class='courseListItem'>";
        $list .="<div class='listItemWrapper'>";
        $list .="<a href='http://localhost/TheSchool/Courses/Get/$value[ID]' target='_self'>";
        $list .="<div><img src='$value[image]'></div>";
        $list .="<div>$value[name]</div>";
        $list .="</a>";
        $list .="</div>";
        $list .="</li>";
    }
    $list .="</ul>";
    return $list;
  }

}
