<?php $courseController = new Courses;
      $students = $courseController->showAllStudents($this->ID);
  ?>
    <div class="rightContainer-wrapper">
        <div class="rightContainer">
            <form class="editCourseForm" action="<?php echo Config::URL ?>Courses/" method="POST" id="courseForm" enctype="multipart/form-data">
                <label style="visibility: hidden;">ID: <input name="ID" type="number" value="<?php echo $this->ID; ?>" style="visibility: hidden;"></label>
                <label>Name: <input name="name" type="text" value="<?php echo $this->name; ?>">*</label>
                <label>Description: <textarea rows="3" name="description" type="text" form="courseForm"><?php echo $this->description; ?></textarea>*</label>
                <label>Profile Image: <input name="profile_image" type="file" value="<?php echo $this->profile_image; ?>" accept=".jpg, .jpeg, .png"></label>
                <br>
                <div class="btnContainer">
                <?php if(!$this->ID): ?>
                        <input type="submit" name="ACTION" value="Insert">
                    <?php endif ?>
                    <input type="submit" name="ACTION" value="Update">
                    <?php $studentCount = count($students); if($studentCount == 0):?>
                    <input type="submit" name="ACTION" value="Delete">
                    <?php endif?>
                </div>
            </form>
        </div>
    </div>
</div>