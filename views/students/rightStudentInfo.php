
  <div class="studentInfo">
    <div class="studentInfoContainer">
      <h3 class="studentName"><?php echo $this->Name;?></h3>
      <img src="<?php echo $this->profile_image?>" class="profile_image">
      <div class="studentPhone"><?php echo $this->phone;?></div>
      <div class="studentEmail"><?php echo $this->email;?></div>
      <div class="editBtn"><a href="<?php echo Config::URL ?>Students/EditStudent/<?php echo $this->ID?>">Edit</a></div>
      <div class="studentsCourses">
      <?php $studentController = new Students;
            $courses = $studentController->GetStudentsCourses($this->ID);
            // print_r($courses);
            foreach ($courses as $key => $course) {
              echo "<div>";
              echo "<img src='$course[image]' alt='Course Image'>";
              echo "<div><strong>$course[name]</strong></div>";
              echo "</div>";
            }?>
      </div>
    </div>
  </div>
</div>