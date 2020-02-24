<?php
session_start();
require '../config/db.php';
$username = $_SESSION['username'];

//if(isset($_POST['submit-photo'])){
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $target_dir = "../uploads/";
    $MAX_FILE_SIZE = 5000000;

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    //allowable extentions
    $allowed = array('jpg','jpeg','png','pdf');
    $allowed_file_types = array('application/pdf; charset-binary');
    $allowed_images_types = array(IMAGETYPE_GIF,IMAGETYPE_JPEG,IMAGETYPE_PNG);

    if(in_array($fileActualExt,$allowed)){
        if($fileError == 0){
            if($fileSize < $MAX_FILE_SIZE){
               // $fileNameNew = uniqid('',true) . "." . $fileActualExt; //stops name collision
                $fileNameNew = "profile${username}." . $fileActualExt;
                $file_destination = $target_dir . $fileNameNew;
                move_uploaded_file($fileTmpName,$file_destination);
                $query_image_update = "UPDATE profile_images SET status=1 WHERE username = '${username}'";
                $result = mysqli_query($conn,$query_image_update);
                header("Location: ../index.php?uploadsuccess");
            }else{
                echo "File too large.";
            }
        }else{
            echo "There was an error uploading your file.";
        }
    }else{
        echo "You cannot upload files of this type.";
    }


//}