<?php 

require 'db_connect.php';


$sql = "SELECT * FROM `data`";
$result = mysqli_query($conn, $sql);
?>