  <div class="adminsInfoWrapper">
    <div class="infoContent">
      <h1>Administrators</h1>
      <p>
      There are <?php $adminController = new Administrators;
      echo $adminController->displayInfo();?> Administrators in The School.
      </p>
      <?php echo $this->message ?>
    </div> 
  </div>
</div>