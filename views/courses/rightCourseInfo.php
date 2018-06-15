
<div class="courseInfo">
  <img src="<?php echo"$this->courseInfo['profile_image']"?>" class="profile_image">
  <h3 class="nameInfo"><?php echo "$this->courseInfo['name']";?></h3>
  <div class="courseDescription"><?php echo "$this->courseInfo['description']";?></div>
  <div class="deleteBtn"><a href="<?php echo Config::URL ?>Courses/Delete/<?php echo "$this->courseInfo['ID']"?>">Delete</a></div>
  <div class="editBtn"><a href="<?php echo Config::URL ?>Students/EditCourse/<?php echo "$this->courseInfo['ID']"?>">Edit</a></div>
</div>