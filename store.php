<?php
    require_once "db_connect.php";
 
    $name =  $_POST['name'];
    $phone =  $_POST['phone'];
    $email =  $_POST['email'];
    $gender =  $_POST['gender'];
    $image = $_POST['image'];
    $image_Path = "image/".$image;
    echo $image;
    echo $image_Path;  
   
    $sql = "INSERT INTO `data` (`name`, `phone`, `email`, `gender`) VALUES ('$name', '$phone', '$email', '$gender')";

    if (mysqli_query($conn, $sql)) {     
 
        echo 'success';
    }
    else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }


?>