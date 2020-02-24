<?php 
    session_start();
    require './inc/header.php';
?>

<form action="./inc/upload.inc.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submit-photo">UPLOAD</button>
</form>





<?php require './inc/footer.php';?>