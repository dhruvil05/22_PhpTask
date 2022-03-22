<?php
require 'db_connect.php';
// require 'add_user.php';

$nameErr = $phoneErr = $emailErr = $genderErr = $imageErr = "";
$name = $phone = $email = $gender = $image = "";

    // $name = $_POST['username'];
    // $phone = $_POST['mobile'];
    // $email = $_POST['email'];
    // $gender = $_POST['gender'];
    // $image = $_FILES['image'];
    

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
         
    }       
    

?>