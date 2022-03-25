<?php
    require "db_connect.php";
    $sno = $_GET['sno'];
    $sql = "SELECT * FROM `data` WHERE sno='$sno'";
    $result = mysqli_query($conn, $sql);
    
    
    if($result){
        $data = mysqli_fetch_array($result);
        if($sno == $data['sno']){
            $image = $data['image'];
            $image_Path = "image/".basename($image);
           $sql = "DELETE FROM `data` WHERE sno='$sno'";
           if (unlink($image_Path)) {
           $result = mysqli_query($conn, $sql);
            header("location:index.php");
           }
        }
        else{
            echo "sorry! your data not deleted. ";
        }
    }
    
 
?>