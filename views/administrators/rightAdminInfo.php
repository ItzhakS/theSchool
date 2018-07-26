<div class="adminInfo">
    <h3 class="adminName"><?php echo $this->name;?></h3>
    <img src="<?php echo $this->profile_image?>" class="profile_image">
    <div class="adminPhone"><?php echo $this->phone;?></div>
    <div class="adminRole"><?php echo $this->role;?></div>
    <div class="adminEmail"><?php echo $this->email;?></div>
    <?php if(Session::get('role') == 'owner'): ?>
    <div class="editBtn"><a href="<?php echo Config::URL ?>administrators/EditAdmin/<?php echo $this->ID?>">Edit</a></div>
    <?php elseif ($this->role == 'Administrator' && Session::get('role') == 'Administrator') :?>
    <div class="editBtn"><a href="<?php echo Config::URL ?>administrators/EditAdmin/<?php echo $this->ID?>">Edit</a></div>
    <?php endif?>
  </div>
</div>