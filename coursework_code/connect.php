<?php
include("connection.php"); // Establishing connection with our database

// Both username and password fields need to be fields need to completed to validate registration
if (empty($_POST["username"]) || empty($_POST["pass_word"])) {
    echo "Both fields are required to validate your registration";
}else{
    $username = $_POST["username"];
    $password = $_POST["pass_word"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    // Insert the user details into the database.
    $sql = "INSERT INTO tellers (username,password,email,gender)
    VALUES ('$username','$password','$email','$gender')";

if ($db->query($sql) === TRUE) {
    echo "New record created successfully, you can login from the homepage";
  } else {
    echo "Error: " . $sql . "<br>" . $db->error;
  }
  
  $db->close();

}

// If Registration is successful, the user will be redirected.
header("Location:Teller.php");
?>

