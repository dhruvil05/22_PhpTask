<!DOCTYPE html>
<html>

<head>
    <title>Ajax Crud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <style>
    td>img {
        width: 50px;
        height: 50px;
    }

    td>img:hover {
        width: 200px;
        height: 200px;
    }
    </style>
</head>

<body>

   
    <div class="d-flex my-3 mr-5" style="float:right;">
        <button type="button" class="btn btn-success mr-2" style="color: white; text-align:right;" data-toggle="modal"
            data-target=".modal">
            Add Data</button>
        <form class="d-flex ">
            <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>

    <div class="container table-responsive">
        <h2 class="text-danger"> All Records</h2><br>

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
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="listing">

                </tbody>
            </table>
        </div>

    </div>


    <!-- insert data form -->
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
                                <input type="file" class="form-control" id="image" name="image"
                                    accept="image/x-png,image/gif,image/jpeg">

                            </div>

                            <button type="submit" class="btn btn-primary" onclick="addRecord()" name="submit"
                                id="form-submit-btn">submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- update data form  -->




    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


    <script>
    $(document).ready(function() {
        readRecords();
        // $('#mytable').DataTable();

        $('#search').keyup(function() {
            search = $(this).val();
            // console.log(search);
            getSearchData(search);
        });
    });

    function getSearchData() {
        if (search !== "") {
            $.ajax({
                type: "GET",
                url: "updateajax.php",
                data: {
                    search: search,
                },
                success: function(data) {
                    $('#listing').html('');
                    $("#listing").append(data);

                }
            });
        }
    }

    function readRecords() {
        var readRecords = "readRecord";
        $.ajax({
            url: "updateajax.php",
            type: "post",
            data: {
                readRecord: readRecords
            },

            success: function(data, status) {
                $('#listing').html(data);

            }

        });
    }



    function addRecord() {
        // alert("hello");
        $("#add-form").on('submit', function(e) {
            //     e.preventDefault();
            console.log(new FormData(this));
            $.ajax({

                type: 'POST',
                url: 'updateajax.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data, status) {
                    alert("Data inserted successfully..")
                    // $("close").click();
                    readRecords();
                }



            });
        });
    }


    // Delete Records call

    function DeleteUser(deleteid) {
        var conf = confirm("Are You Sure Delete?");
        console.log(deleteid);
        if (conf == true) {
            $.ajax({
                url: "updateajax.php",
                type: "post",
                cache: false,
                data: {
                    deleteid: deleteid
                },
                success: function(data, status) {
                    readRecords();
                }

            });
        }
    }

    //  Edit function

    function GetUserDetails(id) {
        $('#hidden_user_id').val(id);

        $.post("updateajax.php", {
                id: id
            },
            function(data, status) {
                var user = JSON.parse(data);
                $('#update_firstname').val(user.firstname);
                $('#update_lastname').val(user.lastname);
                $('#update_email').val(user.email);
                $('#update_mobile').val(user.mobile);
                $('#update_gender').val(user.gender);
                $('#update_image').val(user.image);
            }
        );

        $('.update_modal').modal("show");
    }

    function updateUserdetail() {
        var firstnameupd = $('#update_firstname').val();
        var lastnameupd = $('#update_lastname').val();
        var emailupd = $('#update_email').val();
        var mobileupd = $('#update_mobile').val();
        var genderupd = $('#update_gender').val();
        var imageupd = $('#update_image').val();

        var hidden_user_idupd = $('#hidden_user_id').val();

        $.post("updateajax.php", {
                hidden_user_idupd: hidden_user_idupd,
                firstnameupd: firstnameupd,
                lastnameupd: lastnameupd,
                emailupd: emailupd,
                mobileupd: mobileupd,
                genderupd: genderupd,
                imageupd: imageupd
            },
            function(data, status) {
                $('#update_modal').modal("hide");
                readRecords();
            }

        );
    }
    </script>

</body>

</html>