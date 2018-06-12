<aside class="leftContainer-wrapper">
    <div class="leftContainer">
        <div class="coursesWrapper">
            <?php $courseController = new Courses;
                echo $courseController->GetAll();
            ?>
        </div>
        <a href="students/GetAll" target='_self'>Get All Students</a>
        <hr>
        <a href='administrators/GetAll' target='_self'>Get All Admins</a>
        <hr>
        <a href='courses/GetAll' target='_self'>Get All Courses</a>
        <br>
        <div class="studentsWrapper">
            <?php $studentController = new Students;
            echo $studentController->GetAll(); ?>
        </div>
        
    </div>
</aside>