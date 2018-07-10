    <div class="rightContainer-wrapper">
        <div class="rightContainer">
            <form class="editForm"action="<?php echo Config::URL ?>Students/" method="POST" enctype="multipart/form-data">
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
                <div class="coursesContainer">
                <?php $courseController = new Courses;
                    $courses = $courseController->GetAllCourses();
                    // print_r($courses);
                    foreach ($courses as $key => $course):?>
                        <input type="checkbox" name="courses" id="<?php echo "$course[name]" ?>" value="<?php echo "$course[name]" ?>">
                        <label for="<?php echo "$course[name]" ?>"><?php echo "$course[name]" ?></label>
                        <?php endforeach ?>
                </div>
            </form>
        </div>
    </div>
</div>
