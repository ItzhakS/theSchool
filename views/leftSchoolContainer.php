<div class="leftContainer-wrapper">
    <div class="leftContainer">
        <div class="coursesWrapper">
            <div class="coursesHeader">
                <h2 class="courseListHeader">Courses</h2>
                <button class="addCourse"><a class="add" href="<?php echo Config::URL ?>theSchool/courses/insertCourse">[+]</a></button>
            </div>
            <?php $courseController = new Courses;
                echo $courseController->GetAll();
            ?>
        </div>
        <div class="studentsWrapper">
        <div class="studentsHeader">
                <h2 class="studentListHeader">Students</h2>
                <button class="addStudent"><a class="add" href="<?php echo Config::URL ?>theSchool/students/insertStudent">[+]</a></button>
            </div>
            <?php $studentController = new Students;
            echo $studentController->GetAll(); ?>
        </div>
        
    </div>
</div>