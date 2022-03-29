<?php
if (isset($_POST["submit"])) {
    $NewfileName = $_POST['submit'];
    if (empty($_POST['filename'])) {
        $Newfilename = "gallery";
    }else{
        $NewfileName = strtolower(str_replace(" ","-",$NewfileName));
        

    }
    $ImageTitle = $_POST['filetitle'];
    $ImageDesc = $_POST['filedesc'];
    $ImageLocation = $_POST['filelocation'];
    $ImageCategory = $_POST['filecategory'];
    $ImageStory = $_POST['filestory'];
    $file = $_FILES['file'];
    $filename = $file["name"];
    $filetype = $file["type"];
    $fileTemp = $file["tmp_name"];
    $fileerror = $file["error"];
    $filesize = $file["size"];

    $fileExt = explode(".",$filename);
    $ActualfileExt = strtolower(end($fileExt));

    $allowed = array("jpg","jpeg","png");

    if(in_array($ActualfileExt,$allowed)){
        if($fileerror === 0){
            if($filesize < 4000000){
                $ImgFullName = $NewfileName . "." . uniqid("",true) . ".". $ActualfileExt;
                $fileDestination = "Uploads/".$ImgFullName;

                include("connection.php");
                if(empty($ImageTitle )||empty($ImageDesc)){
                    header("Location : Teller.php?upload=empty");
                    exit();
                }else{
                    $sql = "SELECT * FROM images;";
                    $stmt = mysqli_stmt_init($db);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "SQL could not execute";
                    }else{
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowcount = mysqli_num_rows($result);
                        $setImgOrder = $rowcount + 1;

                        $sql = "INSERT INTO images (titleImage,imgFullName,orderImg,Location,Category,Story) VALUES (?,?,?,?,?,?);";
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "SQL could not load";
                        }else{
                            mysqli_stmt_bind_param($stmt,"ssssss",$ImageTitle,$ImgFullName,$setImgOrder,$ImageLocation,$ImageCategory,$ImageStory);
                            mysqli_stmt_execute($stmt);
                            move_uploaded_file($fileTemp,$fileDestination);
                            header("Location: Teller.php");
                        }
                    }
                }

            } else{
                echo "File is too large";
            }

        }else{
            echo "You had an error";

        }

    }else{
        echo "You need to upload a proper file";
        exit();
    }




    
}