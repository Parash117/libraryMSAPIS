<?php
$servername = "localhost";
$username = "santos";
$password = "MysqlkoPass.99";
$dbname = "libms";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
