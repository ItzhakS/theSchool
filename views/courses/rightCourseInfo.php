
<div class="courseInfo">
  <img src="<?php echo $this->profile_image?>" class="profile_image">
  <h3 class="nameInfo"><?php echo $this->name;?></h3>
  <div class="courseDescription"><?php echo $this->description;?></div>
  <div class="numberOfStudents"><?php ?> Students</div>
  <div class="editBtn"><a href="<?php echo Config::URL ?>Courses/EditCourse/<?php echo $this->ID?>">Edit</a></div>
</div>