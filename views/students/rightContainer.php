<div class="rightContainer-wrapper">
    <div class="rightContainer">
        <form action="<?php echo Config::URL ?>Students/Get" method="POST" >
            <label style="visibility: hidden;">ID: <input name="ID" type="number" value="<?php echo $this->ID; ?>" style="visibility: hidden;"></label>
            <label>Name: <input name="Name" type="text" value="<?php echo $this->Name; ?>"></label>
            <label>Phone Number: <input name="phone" type="number" value="<?php echo $this->phone; ?>"></label>
            <label>Email: <input name="email" type="email" value="<?php echo $this->email; ?>"></label>
            <label>Profile Image: <input name="EmpHireDate" type="date" value="<?php echo $this->profile_image; ?>"></label>
            <br>
            <input type="submit" value="Insert">
            <input type="submit" value="Update">
            <input type="submit" value="Delete">
        </form>
        <?php
        print_r($this->rightContent);
        ?>
    </div>
</div>
