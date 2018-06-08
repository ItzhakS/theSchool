<?php

class Students_Model extends Model {

    function __construct() {
        parent::__construct();
//        parent::loadModel(__CLASS__);
    }
    
    public function Get($studentID){
        try {
            $sql = "SELECT * FROM `theschool`.`students` WHERE ID = :studentID;";
            $stmt = $this->db->prepare($sql);
            if($studentID > 0){
                $stmt->bindParam(':studentID', $studentID);
            } else {
                $stmt->bindParam(':studentID', $_POST['ID']);
            }
            $stmt->execute();
            $this->result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($this->result == NULL){
                throw new Exception('Student Not Found./n');
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
                throw new Exception('Please Fill Out All Fields');
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
            $stmt->bindParam(':EmpHireDate', $_POST['EmpHireDate']);
            $stmt->execute();
            if ($stmt->rowCount() == 0){
                throw new Exception('No employee with that ID exists.');
            } else if($_POST['EmpID'] == "" || $_POST['EmpName'] == "" || $_POST['EmpHireDate'] == ""){
                throw new Exception('Please Fill Out All Fields');
            } else{
            return "Successfully Updated employye number: ".$_POST['EmpID'];
            }
          } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

}
