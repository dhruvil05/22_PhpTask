<?php require 'db_connect.php'; ?>

<?php 
 
 if(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql=" SELECT * FROM `data` WHERE `name` like '%".$search."%' OR `email` like '%".$search."%' OR `phone` like '%".$search."%' OR `gender` like '%".$search."%' OR `created_date` like '%".$search."%' OR `image` like '%".$search."%' ORDER BY `created_date` DESC;";
 }else{
    $sql = "SELECT * FROM `data` ORDER BY `created_date` DESC;";
 }
 
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);


if($result){
        while($data = mysqli_fetch_array($result)){
           echo  '<tr>
            <td>'.$data["name"].'</td>
            <td>'.$data["phone"].'</td>
            <td>'.$data["email"].'</td>
            <td>'.$data["gender"].'</td>
            <td style="justify-content: center; display: flex;">
            <img src="image/'.$data["image"].'" alt="image" class="img">
            </td>
            <td>'.$data["created_date"].'</td>
            <td><button type="button" onclick="deleteData('.$data['sno'].')" class="delete_record" onclick="return confirm'.('Are you sure?').'"
            style="background-color:red;">Delete</button></td>
            <td><button type="button" onclick="GetUserDetails('.$data['sno'].')" class="edit_record" style="background-color:green">
            Edit</button></td>

            </tr>';

         }
// <img src="image/'.$data[" image"].'" alt="image" class="img">
}

 /// get userid for update
 if(isset($_POST['sno']) && isset($_POST['sno']) != "")
 {
   $sno = $_POST['sno'];
   
   $query = "SELECT * FROM `data` WHERE sno=`$sno`";
      if (!$result = mysqli_query($conn, $query)) {
      exit(mysqli_error());
      }
   $response = array();
   if(mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)){
      $response =$row;

      }
   }else{
      $response ['status']=200;
      $response ['message']="Data not found!";
      
      
   }
  echo json_encode($response);
 }else{
   $response ['status']=200;
   $response ['message']="Invalid Request!";
   
   
}

// update data

if(isset($_POST['hidden_user_id'])){
   $hidden_user_id = $_POST['hidden_user_id'];

   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $gender = $_POST['gender'];
   // $image = $_file['image'];

   $sql = "UPDATE `data` SET `name`='$name', `email`='$email', `phone`= '$phone', `gender`='$gender'  WHERE `sno`='$hidden_user_id'";
   // unlink('image/' .basename($filename));
   if(!$result=mysqli_query($conn, $sql)){
      exit(mysqli_error());
   }
}
 
?>