<?php $courseController = new Courses;
      $students = $courseController->showAllStudents($this->ID);
  ?>
<div class="courseInfo">
  <img src="<?php echo $this->profile_image?>" class="profile_image">
  <h3 class="nameInfo"><?php echo $this->name;?></h3>
  <div class="courseDescription"><?php echo $this->description;?></div>
  <div class="numberOfStudents"><?php $studentCount = count($students); if($studentCount == 0)echo " No students"; else if($studentCount == 1) echo "1 Student"; else echo "$studentCount Students"?></div>
  <div class="editBtn"><a href="<?php echo Config::URL ?>Courses/EditCourse/<?php echo $this->ID?>">Edit</a></div>
  <div class ="showAllStudents">
  <?php
    foreach ($students as $key => $student){
      echo "<div>";
      echo "<img src='$student[profile_image]' alt='Course Image'>";
      echo "<div><strong>$student[Name]</strong></div>";
      echo "</div>";
      }?>
    </div>
</div>
