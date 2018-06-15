
<div class="studentInfo">
  <h3 class="studentName"><?php echo "$this->studentInfo[Name]";?></h3>
  <img src="<?php echo"$this->studentInfo[profile_image]"?>" class="profile_image">
  <div class="studentPhone"><?php echo "$this->studentInfo[phone]";?></div>
  <div class="studentEmail"><?php echo "$this->studentInfo[email]";?></div>
  <div class="deleteBtn"><a href="<?php echo Config::URL ?>Students/Delete/<?php echo "$this->studentInfo[ID]"?>">Delete</a></div>
  <div class="editBtn"><a href="<?php echo Config::URL ?>Students/EditStudent/<?php echo "$this->studentInfo[ID]"?>">Edit</a></div>
</div>