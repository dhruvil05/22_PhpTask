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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <title>Hello, world!</title>
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
    <div class="mb-3 div1">

        <a type="button" href="add_user.php" class="btn btn-success float-right">ADD</a>
        <form class="d-flex mx-3" action="index.php" method="post">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success" type="submit" value="search">Search</button>
        </form>

    </div>

    <?php 
        // $columns = array('name','phone','email','gender','image','created_date');
                        
        // $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[5];

        // $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';


               $limit = 10;  
    
               if (isset($_GET["page"])) {
                   $page  = $_GET["page"]; 
                //    var_dump($page); 
                   
                   } 
                   else{ 
                   $page=1;
                   
                   } 
                
                   
                  
                            if(isset($_POST['search']) && !empty($_POST['search'])){
                                $search=  $_POST['search'];
                                strtolower($search);
                                //   var_dump($search);
                            

                                $sql=" SELECT * FROM `data` WHERE `name` like '%".$search."%' OR `email` like '%".$search."%' OR `phone` like '%".$search."%' OR `gender` like '%".$search."%' OR `created_date` like '%".$search."%' OR `image` like '%".$search."%' ORDER BY `created_date` DESC;";

                                
                            
                            }
                            else{
                                $sql = "SELECT * FROM `data` ORDER BY created_date DESC;";

                                    if($result = mysqli_query($conn, $sql)){
                                    
                                        $start_from = ($page-1) * $limit;
                                        $sql = "SELECT * FROM `data` ORDER BY `created_date` DESC LIMIT $start_from, $limit ;";
                                        $result = mysqli_query($conn,$sql);
                                    
                                    }  
                            }
                            
                            // $sql = "SELECT * FROM `data` ORDER BY  $column , $sort_order ;";
                            // $result = mysqli_query($conn, $sql);

                            // if ($result = mysqli_query($conn, $sql)) {
                            //     // Some variables we need for the table.
                            //     $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
                            //     $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
                            //     $add_class = ' class="highlight"';
                                
                            // }
                            $result = mysqli_query($conn, $sql);
                            $rows = mysqli_num_rows($result);
                           
             ?>
    <div class="container">
        <table class="table table-bordered border-primary" id="myTable">
            <tr>
                <!-- <th>id</th> -->
                <th><a href="index.php?column=name&order=<?php echo $asc_or_desc; ?>">Name<i
                            class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a href="index.php?column=phone&order=<?php echo $asc_or_desc; ?>">Phone<i
                            class="fas fa-sort<?php echo $column == 'phone' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a href="index.php?column=email&order=<?php echo $asc_or_desc; ?>">Email<i
                            class="fas fa-sort<?php echo $column == 'email' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a href="index.php?column=gender&order=<?php echo $asc_or_desc; ?>">Gender<i
                            class="fas fa-sort<?php echo $column == 'gender' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a href="index.php?column=image&order=<?php echo $asc_or_desc; ?>">Image<i
                            class="fas fa-sort<?php echo $column == 'image' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a href="index.php?column=created_date&order=<?php echo $asc_or_desc; ?>">Created date<i
                            class="fas fa-sort<?php echo $column == 'created_date' ? '-' . $up_or_down : ''; ?>"></i></a>
                </th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>






            <?php         
                while($data = mysqli_fetch_array($result)){
                    // include 'img_Modal.php'; 
            ?>


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
            /* echo  $total_pages; */
            $pagLink = "<ul class='pagination'>";  
            for ($i=1; $i<=$total_pages; $i++) {
                        $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>";	
            }
            echo $pagLink . "</ul>";  
        ?>

        <?php echo "<b>Total no of rows:" .$rows . "</b>" ; ?>

    </div>


    <!-- <script>
    $(document).ready(function() {
        $("img").click(function() {
            $(this).css({
                "width": "200px",
                "height": "200px"
            });
        });
    });
    </script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>