<?php
session_start();
include("connection.php"); // Establishing connection with our database

// To ensure that the form is not submitted empty
if (empty($_POST["username"]) || empty($_POST["password"])) {
    echo "Both fields are required to validate your Login Credentials";
}else{
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check the database to validate the login Credentials
    $sql = "SELECT uid FROM tellers WHERE username = '$username' AND password = '$password'";

    // The result of the query will be stored in a variable
    $result = mysqli_query($db,$sql);

    if (mysqli_num_rows($result) == 1) {
        setcookie("access_level","standard_user");
        header("Location:Teller.php");
    }
    
    // If the login was unsuccessful, you will be redirected to the Registration page
    else{
        header("Location:Register.html");

        
    }
    
}

?>