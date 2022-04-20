<?php
    require "db_connect.php";
    $sno = $_GET['id'];
   
            $image = $data['image'];
            $image_Path = "image/".basename($image);
            $sql = "DELETE FROM `data` WHERE sno='$sno'";
            
            $result = mysqli_query($conn, $sql); 

            
           if($result){
            echo "success";
            //    if(basename($image_Path)== $image){
                   unlink($image);
            //    }
            //    else{
            //     unlink($image_Path);
            //    }
            
           }
           

?>