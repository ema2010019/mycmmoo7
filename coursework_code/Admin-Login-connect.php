<?php

$username = $_POST['username'];
$password = $_POST['password'];

if($username == "pizzle" && $password =="Fr3shp@_77" ){
    setcookie("accesslevel","adminuser");
    header("Location: Teller.php");
}

else{
    echo "You can gain access through this page";
}


?>