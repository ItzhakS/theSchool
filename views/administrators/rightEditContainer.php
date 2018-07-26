    <div class="rightContainer-wrapper">
        <div class="rightContainer">
            <form id="editAdminForm" class="editAdminForm"action="<?php echo Config::URL ?>administrators/" method="POST" enctype="multipart/form-data">
                <label style="display:none;">ID: <input name="ID" type="number" value="<?php echo $this->ID; ?>" style="visibility: hidden;"></label>
                <label>Name: </label><input name="name" type="text" value="<?php echo $this->name; ?>">*
                <label>Role: </label><select form="editAdminForm" name="role" type="text" value="<?php echo $this->role; ?>"><option value="Administrator">Administrator</option><option value="Sales">Sales</option></select>*
                <label>Phone Number: </label><input name="phone" type="number" value="<?php echo $this->phone; ?>">*
                <label>Email: </label><input name="email" type="email" value="<?php echo $this->email; ?>">*
                <label>Password: </label><input name="password" type="text" value="<?php echo $this->password; ?>">*
                <label>Profile Image: </label><input name="profile_image" type="file" value="<?php echo $this->profile_image; ?>" accept=".jpg, .jpeg, .png">
                <br>
                <div class="btnContainer">
                    <?php if(!$this->ID): ?>
                        <input type="submit" name="ACTION" value="Insert">
                    <?php endif ?>
                    <input type="submit" name="ACTION" value="Update">
                    <?php if(Session::get('name') != $this->name):?>
                        <input type="submit" name="ACTION" value="Delete">
                    <?php endif?>
                </div>
            </form>
            <?php
            echo $this->rightContent;
            ?>
        </div>
    </div>
</div>
