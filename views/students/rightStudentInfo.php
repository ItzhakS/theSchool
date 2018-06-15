
<div class="studentInfo">
  <h3 class="studentName"><?php echo $this->Name;?></h3>
  <img src="<?php echo $this->profile_image?>" class="profile_image">
  <div class="studentPhone"><?php echo $this->phone;?></div>
  <div class="studentEmail"><?php echo $this->email;?></div>
  <div class="editBtn"><a href="<?php echo Config::URL ?>Students/EditStudent/<?php echo $this->ID?>">Edit</a></div>
</div>