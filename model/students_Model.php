<?php

class Students_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    /*
    * Add query for courses the student is in
    * SELECT courses.`name` FROM COURSES where courses.`ID` in (select link_students_courses.`courseID` from link_students_courses where link_students_courses.`studentID` = 1 );
    */
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
    
    /*
    * Add query for courses the student is in
    * SELECT courses.`name` FROM COURSES where courses.`ID` in (select link_students_courses.`courseID` from link_students_courses where link_students_courses.`studentID` = 1 );
    */
    public function Insert(){
        try {
            $sql = "INSERT INTO `theschool`.`students`(`Name`,`phone`, `email`, `profile_image`) VALUES(:Name,:phone, :email, :profile_image);";
            if($_POST['Name'] == "" || $_POST['phone'] == "" || $_POST['email'] == ""){
                throw new Exception('Please Fill Out All Fields with a *');
            } else if(preg_match('~[0-9]+~', $_POST['Name'])){
                 throw new Exception('Do not add numbers to Students name.');
            }else{
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':Name', $_POST['Name']);
            $stmt->bindParam(':phone', $_POST['phone']);
            $stmt->bindParam(':email', $_POST['email']);
            $filePath = "http://localhost/theschool/uploads/";
            if ( $_FILES['profile_image']['name'] == ''){
                $filePath .= 'default-user.png';
                $stmt->bindParam(':profile_image', $filePath);
            } else{
                $fileName = $_FILES["profile_image"]["name"];
                $filePath .= $fileName;
                $stmt->bindParam(':profile_image', $filePath);
            }
            $stmt->execute();
            if($_POST['courses']){
                self::studentCourses();
            }
            }
            if($stmt->rowCount() == 0){
                throw new Exception('Error: Student was not added. Try Again. Don\'t give up!');
            } else{
            return 'Successfully inserted new student. Good Job. Go take a break.';
            }
        } catch (Exception $ex) {
            return $ex->getMessage();
        }   
    }
    
    /*
    * Add query for courses the student is in
    * Update courses.`name` FROM COURSES where courses.`ID` in (select link_students_courses.`courseID` from link_students_courses where link_students_courses.`studentID` = 1 );
    */
    public function Update(){
        try {
            $filePath = "http://localhost/theschool/uploads/";
            if($_FILES['profile_image']["name"] != ''){
                $sql = "UPDATE `theschool`.`students` SET `Name` = :Name,`phone` = :phone, `email` = :email, `profile_image` = :profile_image WHERE `ID` = :ID;";
                $stmt = $this->db->prepare($sql);
                $fileName = $_FILES["profile_image"]["name"];
                $filePath .= $fileName;
                $stmt->bindParam(':profile_image', $filePath);
            } else{
                $sql = "UPDATE `theschool`.`students` SET `Name` = :Name,`phone` = :phone, `email` = :email, WHERE `ID` = :ID;";
                $stmt = $this->db->prepare($sql);
                }
            $stmt->bindParam(':ID', $_POST['ID']);
            $stmt->bindParam(':Name', $_POST['Name']);
            $stmt->bindParam(':phone', $_POST['phone']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->execute();
            if($_POST['courses']){
                self::studentCourses();
            }
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

    public function studentCourses(){
        $courseList = self::getAllCourses();
        $coursesPost = $_POST['courses'];
        $coursesArr = [];
        
        foreach ($courseList as $course) {
            foreach ($coursesPost as $value) {
                if($value == $course['name']){
                    array_push($coursesArr, $course['ID']);
                }
            }
        }
        foreach ($coursesArr as $key) {
            $sql = "INSERT `theschool`.`link_students_courses` SET `studentID` = :studentID, `courseID` = :courseID;";
            $stmt = $this->db->prepare($sql);
            $courseID = $key;
            $stmt->bindParam(':studentID', $_POST['ID']);
            $stmt->bindParam(':courseID', $courseID);
            $stmt->execute();
        }
    }

    public function getAllCourses()
    {
        $sql = "SELECT * FROM `theschool`.`courses`; DELETE FROM `theschool`.`link_students_courses` WHERE studentID = :studentID;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':studentID', $_POST['ID']);
        $stmt->execute();
        $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;
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
         $table= "<ul class='studentsList'>";
         foreach ($data as $key => $value) {
            $table .="<li class='studentListItem'>";
            $table .= "<div><a href='http://localhost/theSchool/Students/Get/$value[ID]' target='_self'>";
            // $table .= "<div>$value[ID]</div>";
            $table .="<div><img src='$value[profile_image]'></div>";
            $table .= "<div>$value[Name]</div>";
            $table .= "</a></div></li>";
         }
         $table .= "</ul>";
         return $table;
     }

     public function GetStudentsCourses($id){
        $sql = "SELECT courses.* FROM COURSES where courses.`ID` in (select link_students_courses.`courseID` from link_students_courses where link_students_courses.`studentID` = :studentID )";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':studentID', $id);
        $stmt->execute();
        $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;
     }

}
