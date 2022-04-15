<?php
    require_once "db_connect.php";
 
    $name =  $_POST['name'];
    $phone =  $_POST['phone'];
    $email =  $_POST['email'];
    $gender =  $_POST['gender'];
    $image = $_POST['image'];
    $image_Path = "image/".$image;
    echo $image;
    // echo $image_Path;
    // $imageFileType = pathinfo($image_Path,PATHINFO_EXTENSION);
    // $imageFileType = strtolower($imageFileType);
    // $valid_extensions = array("jpg","jpeg","png");
   
    $sql = "INSERT INTO `data` (`name`, `phone`, `email`, `gender`, `image`) VALUES ('$name', '$phone', '$email', '$gender', '$image')";

//    $response = 0;

// $result= ;
    if (mysqli_query($conn, $sql)) {     
        
           
        move_uploaded_file($_FILES['img']['tmp_name'], $image_Path);
            header('Location: index.php');
            echo 'success';
    }
    else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }

//    echo $response;
 
    // mysqli_close($conn);
 
?>