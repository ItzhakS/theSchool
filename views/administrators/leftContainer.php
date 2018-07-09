<div class="mainContent">
    <aside class="leftAdminWrapper">
        <div class="leftAdminContainer">
            <div class="adminHeader">
                    <h2 class="adminListHeader">Administrators</h2>
                    <button class="addAdmin"><a class="add" href="<?php echo Config::URL ?>/insertAdmin">[+]</a></button>
                </div>
                <?php $adminController = new Administrators;
                    echo $adminController->GetAll();
                ?>
            
        </div>
    </aside>