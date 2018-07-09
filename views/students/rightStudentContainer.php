    <div class="rightContainer-wrapper">
        <div class="rightContainer">
            <form class="editForm"action="<?php echo Config::URL ?>Students/" method="POST" >
                <label style="visibility: hidden;">ID: <input name="ID" type="number" value="<?php echo $this->ID; ?>" style="visibility: hidden;"></label>
                <label>Name: <input name="Name" type="text" value="<?php echo $this->Name; ?>">*</label>
                <label>Phone Number: <input name="phone" type="number" value="<?php echo $this->phone; ?>">*</label>
                <label>Email: <input name="email" type="email" value="<?php echo $this->email; ?>">*</label>
                <label>Profile Image: <input name="profile_image" type="file" value="<?php echo $this->profile_image; ?>" accept=".jpg, .jpeg, .png"></label>
                <br>
                <div class="btnContainer">
                    <input type="submit" name="ACTION" value="Insert">
                    <input type="submit" name="ACTION" value="Update">
                    <input type="submit" name="ACTION" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
