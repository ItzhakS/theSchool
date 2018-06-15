<div class="rightContainer-wrapper">
    <div class="rightContainer">
        <form action="<?php echo Config::URL ?>Courses/" method="POST" >
            <label style="visibility: hidden;">ID: <input name="ID" type="number" value="<?php echo $this->ID; ?>" style="visibility: hidden;"></label>
            <label>Name: <input name="name" type="text" value="<?php echo $this->name; ?>"></label>
            <label>Phone Number: <input name="description" type="text" value="<?php echo $this->description; ?>"></label>
            <label>Profile Image: <input name="profile_image" type="file" value="<?php echo $this->profile_image; ?>"></label>
            <br>
            <input type="submit" name="ACTION" value="Insert">
            <input type="submit" name="ACTION" value="Update">
            <input type="submit" name="ACTION" value="Delete">
        </form>
        <?php
        echo "$this->rightContent";
        ?>
    </div>
</div>
