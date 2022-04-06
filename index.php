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
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
            

            $limit = 10;  
            $page = isset($_GET["page"]) ? $_GET["page"] : 1;
            
            if(isset($_POST['search']) && !empty($_POST['search'])){
                $search=  $_POST['search'];
                strtolower($search);
                $sql=" SELECT * FROM `data` WHERE `name` like '%".$search."%' OR `email` like '%".$search."%' OR `phone` like '%".$search."%' OR `gender` like '%".$search."%' OR `created_date` like '%".$search."%' OR `image` like '%".$search."%' ORDER BY `created_date` DESC;";

            }
            elseif(isset($_GET["order"])){
                $columns = array('name','phone','email','gender','image','created_date');
                $order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
                $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column']:$column[5];

                $sql = "SELECT * FROM `data` ORDER BY `created_date` DESC;";
                if($result = mysqli_query($conn, $sql))
                {
                    $start_from = ($page-1) * $limit;
                    $sql = "SELECT * FROM `data` ORDER BY `$column` $order LIMIT $start_from, $limit ;";
                    $result = mysqli_query($conn,$sql);
                } 
            }
            else
            {
                $sql = "SELECT * FROM `data` ORDER BY `created_date` DESC;";
                    if($result = mysqli_query($conn, $sql))
                    {
                        $start_from = ($page-1) * $limit;
                        $sql = "SELECT * FROM `data` ORDER BY `created_date` DESC LIMIT $start_from, $limit ;";
                        $result = mysqli_query($conn,$sql);
                    }  
                    
            }                
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($result);
                // $orderdesc = 'desc';
                
        ?>
    <div class="mb-3 div1">
        <a type="button" href="add_user.php" class="btn btn-success float-right">ADD</a>
        <form class="d-flex mx-3" action="index.php?search=<?php echo $search;?>" method="post">
        <input class="form-control me-2" type="hidden" placeholder="search" aria-label="Search" name="search">

            <input class="form-control me-2" type="text" placeholder="search" aria-label="Search" name="search">
            <button class="btn btn-outline-success mx-3" type="submit" value="search">Search</button>
            <!-- <button class="btn btn-outline-danger" type="reset" value="reset">Reset</button> -->

        </form>
    </div>
    <div class="container">
        <table class="table table-bordered border-primary" id="myTable">
        <tr>
                <th><a
                        href="index.php?column=name&order=<?php echo $orderbY = isset($_GET['order'])&&($_GET['order'] == 'desc')  ? 'asc' : 'desc';?>">Name<i
                            class="fas fa-sort"></i></a></th>
                <th><a
                        href="index.php?column=phone&order=<?php echo $orderbY= isset($_GET["order"])&&($_GET["order"] == 'desc')  ? 'asc' : 'desc' ; ?>">Phone<i
                            class="fas fa-sort"></i></a></th>
                <th><a
                        href="index.php?column=email&order=<?php echo $orderbY= isset($_GET["order"])&&($_GET["order"] == 'desc')  ? 'asc' : 'desc' ; ?>">Email<i
                            class="fas fa-sort"></i></a></th>
                <th><a
                        href="index.php?column=gender&order=<?php echo $orderbY= isset($_GET["order"])&&($_GET["order"] == 'desc')  ? 'asc' : 'desc' ; ?>">Gender<i
                            class="fas fa-sort"></i></a></th>
                <th><a
                        href="index.php?column=image&order=<?php echo $orderbY= isset($_GET["order"])&&($_GET["order"] == 'desc')  ? 'asc' : 'desc' ; ?>">Image<i
                            class="fas fa-sort"></i></a></th>
                <th><a
                        href="index.php?column=created_date&order=<?php echo $orderbY= isset($_GET["order"])&&($_GET["order"] == 'desc')  ? 'asc' : $orderdesc ; ?>">Created
                        date<i class="fas fa-sort"></i></a>
                </th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>

            <?php while($data = mysqli_fetch_array($result)){?>
            <tr class="data">
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['phone']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['gender']; ?></td>
                <td style="justify-content: center; display: flex;">
                    <img src="<?php  echo 'image/' .$data['image']; ; ?>" alt="image" class="img">
                </td>
                <td><?php echo $data['created_date']; ?></td>

                <td><a href="delete.php?sno=<?php echo $data['sno']; ?>" onclick="return confirm('Are you sure?')"
                        style="background-color:red;">Delete</a></td>
                <td> <a href="add_user.php?sno=<?php echo $data['sno']; ?>" style="background-color:green">Edit</a></td>
            </tr>
            <?php  } ?>
        </table>
        <?php  
                $sql = "SELECT COUNT(sno) FROM `data`"; 
                $result_db = mysqli_query($conn,$sql);
                
                $row_db = mysqli_fetch_row($result_db);  
                $total_records = $row_db[0];  
                $total_pages = ceil($total_records / $limit); 
                $pagLink = "<ul class='pagination'>";  
                for ($i=1; $i<=$total_pages; $i++){
                            $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>";	
                }
                echo $pagLink . "</ul>";  
            ?>
        <?php echo "<b>Total no of rows:" .$rows . "</b>" ; ?>
    </div>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>