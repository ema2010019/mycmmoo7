<?php
// Definition of Server, Database, Username and Password variables
$servername = "localhost";
$dbname='coursework';
$username = "root";
$password = "";
// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
 die("Connection failed: " . $db->connect_error);

}else{
    echo "";
}

?>