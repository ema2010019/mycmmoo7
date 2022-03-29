<?php
if (isset($_POST['submit'])) {
    $file = $_FILES['fileToUpload'];

    $fileName = $_FILES['fileToUpload']['name'];
    $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
    $fileSize = $_FILES['fileToUpload']['size'];
    $fileError = $_FILES['fileToUpload']['error'];
    $fileType = $_FILES['fileToUpload']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf');

    if (in_array($fileActualExt,$allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 2000000) {
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'Uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                header("Location:Home_page.html?uploadsuccess");
                
            } else{
                echo "You file is too large!";
            }
        } echo "There was an error uploading your file";
    } else{
        echo "You cannot upload files of this type";
    }
}