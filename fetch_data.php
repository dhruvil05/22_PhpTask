<?php 

require 'db_connect.php';

$sql = "SELECT * FROM `data` ORDER BY created_date DESC;";
$result = mysqli_query($conn, $sql);
?>