<div class="infoContainer">
  <h2>The School</h2>
  <p>The School has <?php $theSchoolCont =  new TheSchool; echo $theSchoolCont->studentCount();?> students enrolled and <?php echo $theSchoolCont->courseCount();?> courses offered.</p>
  <p class="errorMessage"><?php echo "$this->message";?></p>
  </div>
</div>
