<?php

if(isset($_POST['submit'])){
     echo "<pre>";
     echo '$_POST: ';
     print_r($_POST);
     echo "</pre>";
     echo "<hr>";
     echo "<pre>";
     echo '$_FILES : ';
     print_r($_FILES);
     echo '</pre>';
     require_once 'upload_file.php';
     exit();
}
?>
<html>
    <head></head>
    <body>
        <form id="data" method="post" enctype="multipart/form-data">
            <input type="text" name="first" value="bob">
            <input type="text" name="last" value="Ahoy">
            <input type="file" name="fileToUpload" value="" accept=".jpg, .jpeg, .png">
            <button name="submit">Send</button>
        </form>
    </body>
</html>

