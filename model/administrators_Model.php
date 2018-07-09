<?php

class Administrators_Model extends Model{
  
  function __contructor(){
    parent::__contructor();
  }

  public function Get($adminID){
    try {
        $sql = "SELECT * FROM `theschool`.`administrators` WHERE ID = :adminID;";
        $stmt = $this->db->prepare($sql);
        if($adminID > 0){
            $stmt->bindParam(':adminID', $adminID);
        } else {
            $stmt->bindParam(':adminID', $_POST['ID']);
        }
        $stmt->execute();
        $this->result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($this->result == NULL){
            throw new Exception('Administrator Not Found./n');
        } else{
        return $this->result;
        }
    } catch (Exception $ex){
        return $ex->getMessage();
    }
  }

  public function Insert(){
    try {
        $sql = "INSERT INTO `theschool`.`administrators`(`name`,`phone`, `role`, `email`, `password`, `profile_image`) VALUES(:name,:phone,:role,:email, :password, :profile_image);";
        if($_POST['name'] == "" || $_POST['phone'] == "" || $_POST['role'] == "" || $_POST['email'] == "" || $_POST['password'] == ""){
            throw new Exception('Please Fill Out All Fields with a *');
        } else if(preg_match('~[0-9]+~', $_POST['name'])){
            throw new Exception('Do not add numbers to Admins name.');
        }else{
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':phone', $_POST['phone']);
        $stmt->bindParam(':role', $_POST['role']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':password', $_POST['password']);
        $stmt->bindParam(':profile_image', $_POST['profile_image']);
        $stmt->execute();
        }
        if($stmt->rowCount() == 0){
            throw new Exception('Admin not saved.');
        } else{
        return 'Successfully inserted new Admin member. Good Job. Go take a break.';
        }
    } catch (Exception $ex) {
        return $ex->getMessage();
    }   
  }

  public function Update(){
    try {
        $sql = "UPDATE `theschool`.`administrators` SET `name` = :name,`phone` = :phone, `role` = :role, `email` = :email, `password` = :password, `profile_image` = :profile_image WHERE `ID` = :ID;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':ID', $_POST['ID']);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':role', $_POST['role']);
        $stmt->bindParam(':phone', $_POST['phone']);
        $stmt->bindParam(':password', $_POST['password']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':profile_image', $_POST['profile_image']);
        $stmt->execute();
        if ($stmt->rowCount() == 0){
            throw new Exception('No Student affected.');
        } else if($_POST['name'] == "" || $_POST['phone'] == "" || $_POST['role'] == "" || $_POST['email'] == "" || $_POST['password'] == ""){
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
        $sql = "DELETE FROM `theschool`.`administrators` WHERE ID = :ID;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':ID', $_POST['ID']);
        $stmt->execute();
        if ($stmt->rowCount() == 0){
            throw new Exception('Error, Admin not Deleted.');
        } else{
        return "Admin: ".$_POST['name'].' Deleted!';
        }
      } catch (Exception $ex) {
        return $ex->getMessage();
    }
  }

  public function GetAll(){
    $sql = "SELECT * FROM `theschool`.`administrators`;";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $this;
  }

  public function ToHTML(){
    $data = $this->result;
    $table= "<ul class='adminList'>";
    foreach ($data as $key => $value) {
        $table .="<li class='adminListItem'>";
        $table .= "<div class='listItemWrapper'>";
        $table .= "<a href='../TheSchool/Administrators/Get/$value[ID]' target='_self'>";
        $table .= "<div>$value[ID]</div>";
        $table .= "<div>$value[name]</div>";
        $table .= "<div>$value[role]</div>";
        $table .="<div>$value[phone]</div>";
        $table .="<div>$value[email]</div>";
//        $table .="<div>$value[profile_image]</div>";
        $table .= "</a>";
        $table .= "</div>";
        $table .= "</li>";
    }
    $table .= "</ul>";
    return $table;
  }

  public function adminCount(){
    // try {
        $sql = "SELECT COUNT(ID) FROM `theschool`.`administrators`;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;
    // }
    // catch(){

    // }
  }


}

