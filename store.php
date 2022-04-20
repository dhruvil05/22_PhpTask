<?php
    require_once "db_connect.php";
 
    $name =  $_POST['name'];
    $phone =  $_POST['phone'];
    $email =  $_POST['email'];
    $gender =  $_POST['gender'];
    $image = $_FILES['image']['name'];
    
    $image_Path = "image/".basename($image);
    // echo $image;
    echo $image_Path;  
   
    $sql = "INSERT INTO `data` (`name`, `phone`, `email`, `gender`, `image`) VALUES ('$name', '$phone', '$email', '$gender', '$image')";

    if (move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)) {     
        mysqli_query($conn, $sql);
        echo 'success';
    }
    else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }


?>