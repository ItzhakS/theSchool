    <div class="rightContainer-wrapper">
        <div class="rightContainer">
            <form class="editForm"action="<?php echo Config::URL ?>Students/" method="POST" enctype="multipart/form-data">
                <label style="visibility: hidden;">ID: <input name="ID" type="number" value="<?php echo $this->ID; ?>" style="visibility: hidden;"></label>
                <label>Name: <input name="Name" type="text" value="<?php echo $this->Name; ?>" required>*</label>
                <label>Phone Number: <input name="phone" type="number" value="<?php echo $this->phone; ?>" required>*</label>
                <label>Email: <input name="email" type="email" value="<?php echo $this->email; ?>" required>*</label>
                <label >Profile Image: <input id="fileElem" name="profile_image" type="file" value="<?php echo $this->profile_image; ?>" onchange="handleFiles(this.files)" accept=".jpg, .jpeg, .png"></label>
                <span id="fileList"></span>
                <br>
                <div class="btnContainer">
                <?php if(!$this->ID): ?>
                        <input type="submit" name="ACTION" value="Insert">
                    <?php endif ?>
                    <input type="submit" name="ACTION" value="Update">
                    <input type="submit" name="ACTION" value="Delete" onclick="return confirm('Are you sure?')">
                </div>
                <div class="coursesContainer">
                <?php $courseController = new Courses;
                    $coursesList = $courseController->GetAllCourses();
                    $studentController = new Students;
                    $coursesEnrolled = $studentController->GetStudentsCourses($this->ID);
                    // print_r($courses);
                    foreach ($coursesList as $key => $course):?>
                    <label for="<?php echo "$course[name]" ?>">
                    <?php if(in_array($course, $coursesEnrolled)):?>
                        <input type="checkbox" name="courses[]" value="<?php echo "$course[name]" ?>" checked/>
                    <?php else:?>
                        <input type="checkbox" name="courses[]" value="<?php echo "$course[name]" ?>"/>
                    <?php endif?>
                        <?php echo "$course[name]" ?></label>
                        <?php endforeach ?>
                </div>
            </form>
        </div>
    </div>
</div>
