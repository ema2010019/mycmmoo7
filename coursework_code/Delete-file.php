<?php
$fileNames = $_POST["filename"];
$removeSpaces = str_replace(" ","",$fileNames);
$allFileNames = explode(",",$removeSpaces);
$countAllNames = count($allFileNames);

for ($i = 0; $i < $countAllNames; $i++){
    if(file_exists("Uploads/".$allFileNames[$i])== false){
        header("Location: Teller.php?deleteerror");
        exit();

    }
}

for($i = 0; $i < $countAllNames; $i++){
    $path = "Uploads/".$allFileNames[$i];
if(!unlink($path)){
    echo "You have an error";}
    exit();
}

header("Location: Teller.php?Success");
