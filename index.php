<?php require "db_connect.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Listing Page</title>
    <style>
    .div1 {
        display: flex;
        float: right;
        /* margin-right: 55px;
                width: 100px; */
    }

    .heading {
        width: auto;
        margin-left: 50px;
        font-weight: bold;
        border-bottom: 1px solid black;
    }

    .heading>a {
        text-decoration: none;
        color: black;
    }

    td>img {
        width: 200px;
        height: 100px;
    }

    td>img:hover {
        width: 300px;
        height: 300px;
    }

    td>a {
        text-decoration: none;
        border: 1px solid black;
        border-radius: 8px;
        padding: 5px;
        color: white;
        position: relative;
        left: 10px;
        top: 40px;

    }

    td>a:hover {
        color: black;
    }

    .btn {
        width: 100px;
    }

    .pagination {
        float: right;
    }
    </style>
</head>

<body>
    <h2 class="heading"><a href="index.php"> User List</a></h2>


    <?php 
            
            
            
            
            // if(isset($_POST['search']) && !empty($_POST['search'])){
            //         $search=  $_POST['search'];
            //         strtolower($search);
            //         $sql=" SELECT * FROM `data` WHERE `name` like '%".$search."%' OR `email` like '%".$search."%' OR `phone` like '%".$search."%' OR `gender` like '%".$search."%' OR `created_date` like '%".$search."%' OR `image` like '%".$search."%' ORDER BY `created_date` DESC;";
                
            //     }
                
            // else
            // {
            $sql = "SELECT * FROM `data` ORDER BY `created_date` DESC;";
                  
                    
            // }                
            $result = mysqli_query($conn, $sql);
            // $rows = mysqli_num_rows($result);
            
                ?>
    <div class="mb-3 div1">
        <a type="button" href="add_user.php" class="btn btn-success float-right">ADD</a>
        <form class="d-flex mx-3" action="index.php" method="post">
            <input class="form-control me-2" type="text" aria-label="Search" name="search"
                value="<?php if(isset($_POST['search']) && !empty($_POST['search'])){echo $search; }else{echo 'search';} ?>">
            <button class="btn btn-outline-success mx-3" type="submit" value="search">Search</button>
            <a href="http://localhost/php/phptask/index.php" class="btn btn-outline-danger" type="reset"
                value="reset">Reset</a>

        </form>
    </div>
    <div class="container table-responsive">
        <div class="table-responsive">
            <table class="table table-bordered border-primary" id="user_data">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>contact</th>
                        <th>email</th>
                        <th>gender</th>
                        <th>image</th>
                        <th>created_date</th>

                    </tr>
                </thead>
                <?php while($data = mysqli_fetch_array($result)){
                
                echo '<tr>
                        <td>'.$data["name"].'</td>
                        <td>'.$data["phone"].'</td>
                        <td>'.$data["email"].'</td>
                        <td>'.$data["gender"].'</td>
                        <td style="justify-content: center; display: flex;">
                        <img src="image/'.$data["image"].'" alt="image" class="img">
                        </td>
                        <td>'.$data["created_date"].'</td>
                        <td><a href="delete.php?sno='.$data['sno'].'" onclick="return confirm'.('Are you sure?').'"
                        style="background-color:red;">Delete</a></td>
                        <td> <a href="add_user.php?sno='. $data['sno'].'" style="background-color:green">Edit</a></td>
            
                        </tr>';
                    } ;?>
            </table>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
    $('#user_data').DataTable();
});
</script>


</html>