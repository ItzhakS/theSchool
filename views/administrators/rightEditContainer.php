    <div class="rightContainer-wrapper">
        <div class="rightContainer">
            <form class="editAdminForm"action="<?php echo Config::URL ?>administrators/" method="POST" enctype="multipart/form-data">
                <label style="visibility: hidden;">ID: <input name="ID" type="number" value="<?php echo $this->ID; ?>" style="visibility: hidden;"></label>
                <label>Name: <input name="name" type="text" value="<?php echo $this->name; ?>">*</label>
                <label>Role: <input name="role" type="text" value="<?php echo $this->role; ?>">*</label>
                <label>Phone Number: <input name="phone" type="number" value="<?php echo $this->phone; ?>">*</label>
                <label>Email: <input name="email" type="email" value="<?php echo $this->email; ?>">*</label>
                <label>Password: <input name="password" type="text" value="<?php echo $this->password; ?>">*</label>
                <label>Profile Image: <input name="profile_image" type="file" value="<?php echo $this->profile_image; ?>" accept=".jpg, .jpeg, .png"></label>
                <br>
                <div class="btnContainer">
                    <input type="submit" name="ACTION" value="Insert">
                    <input type="submit" name="ACTION" value="Update">
                    <input type="submit" name="ACTION" value="Delete">
                </div>
            </form>
            <?php
            echo $this->rightContent;
            ?>
        </div>
    </div>
</div>
