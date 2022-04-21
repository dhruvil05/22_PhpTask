<?php
include "db_connect.php";

function fetch_data(){
    global $conn;
     $query="SELECT * from  `data` ORDER BY created_date DESC";
     $exec=mysqli_query($conn, $query);
     if(mysqli_num_rows($exec)>0){
       $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
       return $row;  
           
     }else{
       return $row=[];
     }
   }
   $fetchData= fetch_data();
show_data($fetchData);

function show_data($fetchData){
    echo '<table border="1">
           <tr>
               <th>Name</th>
               <th>Phone</th>
               <th>Email</th>
               <th>Gender</th>
               <th>Image</th>
               <th>Created_date</th>
               <th>Delete</th>
               <th>Edit</th>

           </tr>';
    if(count($fetchData)>0){
         $sno=1;
         foreach($fetchData as $data){ 
     echo "<tr>
             
             <td>".$data['name']."</td>
             <td>".$data['phone']."</td>
             <td>".$data['email']."</td>
             <td>".$data['gender']."</td>
             <td>".$data['image']."</td>
             <td>".$data['created_date']."</td>
             <td><a href='delete.php?sno=".$data['sno']."'>Delete</a></td>
             <td><a href='add_user.php?sno=".$data['sno']."'>Edit</a></td>
      </tr>";
          
     $sno++; 
        }
   }else{
        
     echo "<tr>
           <td colspan='7'>No Data Found</td>
          </tr>"; 
   }
     echo "</table>";
   }


// while($row = mysqli_fetch_array($result)){
//   $name = $row['name'];
//   $phone = $row['phone'];
//   $email = $row['email'];
//   $gender = $row['gender'];
//   $image = $row['image'];
//   $created_date = $row['created_date'];

//   $html .= "<tr>
//     <td>".$name."</td>
//     <td>".$phone."</td>
//     <td>".$email."</td>
//     <td>".$gender."</td>
//     <td>".$image."</td>
//     <td>".$created_date."</td>

//   </tr>";
// }

// echo $html;
?>