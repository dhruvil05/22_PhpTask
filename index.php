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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <!-- Datatable CSS -->
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

    td>button {
        text-decoration: none;
        border: 1px solid black;
        border-radius: 8px;
        padding: 5px;
        color: white;
        position: relative;
        left: 10px;

    }

    td>a {
        text-decoration: none;
        border: 1px solid black;
        border-radius: 8px;
        padding: 5px;
        color: white;
        position: relative;
        left: 10px;

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

    .container {

        padding-bottom: 10px;

    }

    .error {
        color: red;
    }

    .file {
        visibility: hidden;
        position: absolute;
    }
    </style>
</head>

<body>
    <h2 class="heading"><a href="index.php"> User List</a></h2>


    <!-- <?php 
           
            if(isset($_POST['search']) && !empty($_POST['search'])){
                    $search=  $_POST['search'];
                    strtolower($search);
                    $sql=" SELECT * FROM `data` WHERE `name` like '%".$search."%' OR `email` like '%".$search."%' OR `phone` like '%".$search."%' OR `gender` like '%".$search."%' OR `created_date` like '%".$search."%' OR `image` like '%".$search."%' ORDER BY `created_date` DESC;";
                
            }   
            else
            {
                $sql = "SELECT * FROM `data` ORDER BY `created_date` DESC;";
            }                
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($result);
            
                ?> -->
    <div class="mb-3 div1">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modal">ADD</button>

        <form class="d-flex mx-3" action="index.php" method="post">
            <input class="form-control me-2" type="text" aria-label="Search" id='searching' name="search"
                placeholder="search">
            <button class="btn btn-outline-danger mx-3" type="submit" value="search" id="search">Reset</button>
            <!-- <a href="http://localhost/php/phptask/index.php" class="btn btn-outline-danger" type="reset"
                value="reset">Reset</a> -->

        </form>
    </div>

    <div class="container table-responsive">

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>contact</th>
                        <th>email</th>
                        <th>gender</th>
                        <th>image</th>
                        <th>created_date</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="user_data">

                </tbody>
            </table>
        </div>

    </div>

    <!-- Add data modal -->
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <form action="" method="post" enctype="multipart/form-data" id="add-form">
                            <u>
                                <h2>Add User</h2>
                            </u>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>

                                <input type="varchar" class="form-control name" id="name" aria-describedby="nameHelp"
                                    name="name">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>

                                <input type="email" class="form-control" aria-describedby="emailHelp" name="email"
                                    id="email">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>

                            <div class="mb-3">

                                <label for="mobileNo" class="form-label">Mobile No</label>
                                <input type="number" class="form-control" id="phone" max='9999999999' min='1000000000'
                                    name="phone">

                            </div>

                            <div class="form-check">
                                <input class="form-check-input gender" type="radio" name="gender" id="gender"
                                    <?php if(isset($row)&&$row['gender'] == 'male'){?> checked <?php  }?> value="male">
                                <label class=" form-check-label" for="flexRadioDefault1">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input gender" type="radio" name="gender" id="gender"
                                    <?php if(isset($row)&&$row['gender'] == 'female'){?> checked
                                    <?php }if(!isset($row)){?> checked <?php }?>value="female">
                                <label class="form-check-label" for="flexRadioDefault2">Female</label>
                            </div>


                            <div class="mb-3">
                                <br>
                                <input type="file" class="form-control" id="img" name="image"
                                    accept="image/x-png,image/gif,image/jpeg">

                            </div>

                            <button type="submit" class="btn btn-primary" onclick="insert()" name="submit"
                                id="form-submit-btn">submit</button>
                            <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Update data modal  -->
    <div class="modal" tabindex="-1" role="dialog" id="update_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <form action="" method="" enctype="multipart/form-data" id="update-form">

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>

                                <input type="varchar" class="form-control name" id="update_name"
                                    aria-describedby="nameHelp" name="name">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>

                                <input type="email" class="form-control" aria-describedby="emailHelp" name="email"
                                    id="update_email">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>

                            <div class="mb-3">

                                <label for="phone" class="form-label">Mobile No</label>
                                <input type="number" class="form-control" id="update_phone" max='9999999999'
                                    min='1000000000' name="phone">

                            </div>

                            <div class="form-check">
                                <input class="form-check-input gender" type="radio" name="gender" id="update_gender"
                                    value="male">
                                <label class=" form-check-label" for="flexRadioDefault1">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input gender" type="radio" name="gender" id="update_gender"
                                    value="female">
                                <label class="form-check-label" for="flexRadioDefault2">Female</label>
                            </div>


                            <div class="mb-3">
                                <br>
                                <input type="file" class="form-control" id="update_img" name="image"
                                    accept="image/x-png,image/gif,image/jpeg">

                            </div>

                            <button type="submit" class="btn btn-primary" onclick="updateData()" name="submit"
                                id="form-submit-btn">Update</button>
                            <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                            <input type="hidden" name="" id="hidden_user_id">

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

<script>
// 
$(document).ready(function() {
    $('#searching').keyup(function() {
        search = $(this).val();
        getSearchData(search);
    });



    getListing()
});



function getSearchData() {
    if (search !== "") {
        $.ajax({
            type: "GET",
            url: "http://localhost/php/phptask/fetch.php",
            data: {
                search: search,
            },
            success: function(data) {
                $('#user_data').html('');
                $("#user_data").append(data);
                // $('.delete_record').click(function() {
                //     id = $(this).attr('data-id');
                //     deleteData(id)
                // });
                // $('.edit_record').click(function() {
                //     GetUserDetails()
                // });
            }
        });
    }
}

function getListing() {
    $.ajax({
        type: "GET",
        url: "http://localhost/php/phptask/fetch.php",
        data: {},
        success: function(data) {
            // $('#user_data').html('')
            $('#user_data').html(data)
            // $('.delete_record').click(function() {
            //     id = $(this).attr('data-id');
            //     deleteData(id)
            // });
            // $('.edit_record').click(function() {
            //     GetUserDetails()
            // });
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }

    });
}

function GetUserDetails(sno) {
    // $('#hidden_user_id').val(sno);
    console.log(sno);
    $.post("fetch.php", {
            sno: sno
        }, function(data, status) {
            var user = JSON.parse(data);
            alert(user);
            
            $('#update_name').val(user.name);
            $('#update_phone').val(user.phone);
            $('#update_email').val(user.email);
            $('#update_gender').val(user.gender);
            $('#update_img').val(user.image);
        }),
        $("#update_modal").modal("show");
}   

function updateData() {
    // var name = $('#update_name').val();
    // var phone = $('#update_phone').val();
    // var email = $('#update_email').val();
    // var gender = $('#update_gender').val();
    // var image = $('#update_img').val();

    // var hidden_user_id = $('#hidden_user_id').val();
    // var formdata = new formData(this);
    alert(new formData(this));
    $.post("fetch.php", {
            
            // name: name,
            // phone: phone,
            // email: email,
            // gender: gender,
            // image: image,
        },
        function(data, status) {
            $("#update_modal").modal("hide");
            getListing()
        },

    );

}




function deleteData(id) {
    var x = confirm("Are you sure you want to delete?");
    if (x) {
        $.ajax({
            type: "GET",
            url: "http://localhost/php/phptask/delete.php",
            data: {
                id: id
            },
            success: function(data) {
                // alert('record deleted successfully..')
                getListing()
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }

        });
    }
}

function insert() {
    // alert("hello");
    $("#add-form").on('submit', function(e) {
        e.preventDefault();

        $.ajax({

            type: 'POST',
            url: 'http://localhost/php/phptask/store.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            // beforeSend: function() {

            // },
            success: function(data) {
                alert('Record successfully inserted...');
                // $('.close').click();
                getListing();

            }
        });
    });
}


// $(document).ready(function(e) {
// validation();
// });
function validation() {
    $successMsg = insert();
    if (phone.length < 10) {
        $('#phone').after('<span class="error">This field is required(10 digit)</span>');
    }

    $('form[id="add-form"]').validate({
        rules: {
            name: 'required',
            phone: 'required',
            email: {
                required: true,
                email: true,

            }
        },
        messages: {
            name: 'This field is required',
            phone: 'This field is required',
            email: 'Enter a valid email',
        },



        // insert();
        submitHandler: function(form) {
            $successMsg.show();
            // $('.close').click();

        },
        success: function(form) {
            insert();

        }

    });
}
</script>

</html>