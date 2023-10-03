<?php
session_start();
// $conn = mysqli_connect("localhost", "root", "", "gogaga1");
$date = date('Y-m-d');

$hostname='http://localhost/gogaga/';

// session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gogaga1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $con->connect_error);
}



/*Agent Approval Code*/
 // 0 => Submitted
 // 1 => Approved
 // 2 => Review

/*Agent status Code*/
 // 0 => Profile Not Completed
 // 1 => Active
 // 2 => In-Active 


?>