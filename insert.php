<?php
require 'db_connect.php';
// require 'add_user.php';

$nameErr = $phoneErr = $emailErr = $genderErr = $imageErr = "";
$name = $phone = $email = $gender = $image = "";

   
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
 

    

        if (empty($_POST["username"])) {
            $nameErr = "is required";
         } else {
           $name = $_POST["username"];
           
         }
         if (empty($_POST["email"])) {
             $emailErr = "is required";
          } else {
            $email = $_POST["email"];
            
          }
         
          $phone = $_POST['phone'];
          $gender = $_POST['gender'];
          
         
       
            $Get_image_name = $_FILES['image']['name'];
            
            
            $image_Path = "image/".basename($Get_image_name);
            if(isset($_POST['sno'])&& $_POST['sno']>0){
              $sno = $_POST['sno'];
              $sqlget = "SELECT * FROM `data` WHERE `sno` = $sno";
              $result= mysqli_query($conn, $sqlget);
              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
              $filename= $row['image'];
              $sql = "UPDATE `data` SET `name`='$name', `email`='$email', `phone`= '$phone', `gender`='$gender', `image`='$Get_image_name' WHERE `sno`='$sno'";
            }else{
              
              $sql = "INSERT INTO `data` (`name`, `phone`, `email`, `gender`, `image`) VALUES ('$name', '$phone', '$email', '$gender', '$Get_image_name')";
            }
        
            if (move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)) {
                
                mysqli_query($conn, $sql);

                header("Location: index.php");
            }else{
                echo  '<script> alert("please! insert image.") ;</script>';
            }

} 


?>

