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
         
          $phone = $_POST['mobile'];
          $gender = $_POST['gender'];
       
         
       
            $Get_image_name = $_FILES['image']['name'];
            
            
            $image_Path = "image/".basename($Get_image_name);
            // $file_ext= strtolower(end(explode('.',$Get_image_name)));
            // $extensions= array("jpeg","png", "gif");
           

            $sql = "INSERT INTO `data` (`name`, `phone`, `email`, `gender`, `image`) VALUES ('$name', '$phone', '$email', '$gender', '$Get_image_name')";
        
            if (move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)) {
                
                mysqli_query($conn, $sql);

                header("Location: index.php");
            }else{
                echo  "image not inserted";
            }

} 


?>