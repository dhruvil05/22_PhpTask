<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <title>Hello, world!</title>
    <style>
    .div1 {
        display: flex;
        float: right;
        margin: 10px;
    }

    .heading {
        width: auto;
        margin-left: 50px;
        font-weight: bold;
        border-bottom: 1px solid black;
    }
    </style>
</head>

<body>

    <h2 class="heading">User List</h2>
    <div class="mb-3 div1">

        <a type="button" href="add_user.php" class="btn btn-success float-right">ADD</a>
        <form class="d-flex mx-3" action="search.php" method="post">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
            <button class="btn btn-outline-success" type="submit" value="search">Search</button>
        </form>

    </div>

    <div class="container">
        <table class="table table-bordered border-primary" id="myTable">
            <tr>
                <!-- <th>id</th> -->
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Image</th>
                <th>Created date</th>
            </tr>
            <?php
                // include "img_display.php";
                
                
                require "fetch_data.php";
                
                
                $rows = mysqli_num_rows($result);
                 
                         while($data = mysqli_fetch_array($result)){
                            include 'img_Modal.php';
            ?>

            <tr class="data">

                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['phone']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['gender']; ?></td>

                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal">
                        <?php echo $data['image']; ?>
                    </button>
                </td>

                <td><?php echo $data['created_date']; ?></td>


            </tr>
            <?php  } ?>
        </table>

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
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</body>

</html>