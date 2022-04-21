<?php

include 'db_connect.php';
extract($_POST);

if (isset($_POST['readRecord'])||isset($_GET['search'])) {

   
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $displayquery = " SELECT * FROM `data` WHERE `name` like '%" . $search . "%' OR `phone` like '%" . $search . "%' OR `email` like '%" . $search . "%' OR `gender` like '%" . $search . "%'  OR `created_date` like '%" . $search . "%' ORDER BY `created_date` DESC;";
    } else {

        $displayquery = " SELECT * FROM `data` ORDER BY `created_date` DESC";
    }
    $result = mysqli_query($conn, $displayquery);
    
    if (mysqli_num_rows($result) > 0) {

        // $number = 1;
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['phone'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['gender'] . '</td>
                    <td style="justify-content: center; display: flex;">
                    <img src="image/'.$row["image"].'" alt="image" class="img">
                    </td>
                    <td>' . $row['created_date'] . '</td>
                    <td>
                        <button onclick ="GetUserDetails(' . $row['sno'] . ')" name="user_id"
                        class="btn btn-primary">Edit</button>
                    </td>
                    <td>
                        <button onclick="DeleteUser(' . $row['sno'] . ')" name="deleteid" class="btn btn-danger">Delete</button>
                    </td>
                </tr>';
            // $number++;
        }
    }
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['gender']) && isset($_FILES['image']['name'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $image = $_FILES['image']['name'];

    $image_Path = "image/".basename($image);
    // alert($name);
    if($image ==''){

        $insert_query = "INSERT INTO `data`(`name`, `phone`, `email`, `gender`) VALUES ('$name','$phone','$email','$gender');";
    }else{

        $insert_query = "INSERT INTO `data`(`name`, `phone`, `email`, `gender`, `image`) VALUES ('$name','$phone','$email','$gender','$image');";
    }

    
    if (mysqli_query($conn, $insert_query)) {    
        move_uploaded_file($_FILES['image']['tmp_name'], $image_Path);
        echo 'success';
    }
    else {
    echo "Error: " . $insert_query . "" . mysqli_error($conn);
    }
    // mysqli_query($conn, $insert_query);
}

// Delete User record


if (isset($_POST['deleteid'])) {

    $deleteid = $_POST['deleteid'];
    $deletequery = "delete from data where sno='$deleteid' ";
    echo $deletequery;

    mysqli_query($conn, $deletequery);
}

// Update for userid

if (isset($_POST['id']) && isset($_POST['id']) != "") {
    $user_id = $_POST['id'];
    $query = "SELECT * FROM crudajax WHERE id ='$user_id'";
    if ($result = mysqli_query($conn, $query))
        $response = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $response = $row;
        }
    } else {
        $response['status'] = 200;
        $response['message'] = "Data not found";
    }
    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
//   update table

if (isset($_POST['hidden_user_idupd'])) {
    $hidden_user_idupd = $_POST['hidden_user_idupd'];
    $firstnameupd = $_POST['firstnameupd'];
    $lastnameupd = $_POST['lastnameupd'];
    $emailupd = $_POST['emailupd'];
    $mobileupd = $_POST['mobileupd'];
    $genderupd = $_POST['genderupd'];
    $imageupd = $_POST['imageupd'];


    $query = "UPDATE `crudajax` SET `firstname`='$firstnameupd',`lastname`='$lastnameupd',
    `email`='$emailupd',`mobile`='$mobileupd',`gender`='$genderupd',`image`='$imageupd' WHERE id = '$hidden_user_idupd'";


    mysqli_query($conn, $query);
}