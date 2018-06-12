<div class="leftContainer-wrapper">
    <div class="leftContainer">
        <div class="coursesWrapper">
            <?php $courseController = new Courses;
                echo $courseController->GetAll();
            ?>
        </div>
        <div class="studentsWrapper">
            <?php $studentController = new Students;
            echo $studentController->GetAll(); ?>
        </div>
        
    </div>
</div>