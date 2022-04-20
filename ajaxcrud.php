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
            width: 200px;
            height: 100px;
        }

        td>img:hover {
            width: 300px;
            height: 300px;
        }
        </style>
    </head>

    <body>
        <div class="mb-3 mt-3 div1 d-flex" style="float:right">
            <button type="button" class="btn btn-success " style="" data-toggle="modal" data-target="#myModal">
                Add User</button>

            <form class="d-flex mx-3" style="" action="" method="post">
                <input class="form-control me-2" type="text" aria-label="Search" id='search' name="search"
                    placeholder="search">
                <!-- <button class="btn btn-outline-danger mx-3" type="submit" value="search" id="search">Reset</button> -->

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
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="records_contant">

                    </tbody>
                </table>
            </div>

        </div>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ajax Crud Operation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" method="post" enctype='multipart/form-data'>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="" id="name" class="form-control" placeholder="Enter name">
                            </div>

                            <div class="form-group">
                                <label>Email id:</label>
                                <input type="text" name="" id="email" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label>phone:</label>
                                <input type="number" name="phone" id="phone" class="form-control"
                                    placeholder="Enter number" maxlength="10">
                            </div>
                            <div class="form-group">
                                <label>Gender:</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image:</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" data-dismiss="modal"
                                onclick="addRecord()">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>

        <!-- ////////////    Update Function ////////////////////  -->

        <div class="modal" id="update_user_modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ajax Crud Operation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type="text" name="name" id="update_name" class="form-control"
                                placeholder="first name">
                        </div>


                        <div class="form-group">
                            <label>Email id:</label>
                            <input type="text" name="email" id="update_email" class="form-control"
                                placeholder="email id">
                        </div>
                        <div class="form-group">
                            <label>Mobile number:</label>
                            <input type="tel" name="mobile" id="update_phone" class="form-control"
                                placeholder="mobile number" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label>Gender:</label>
                            <select name="gender" id="update_gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image:</label>
                            <input type="file" name="image" id="update_image" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal"
                            onclick="updateUserdetail()">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="hidden" name="" id="hidden_user_id">
                    </div>
                </div>
            </div>
        </div>
        </div>



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
                console.log(search);
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
                        $('#records_contant').html('');
                        $("#records_contant").append(data);

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
                    $('#records_contant').html(data);

                }

            });
        }

        // function addRecord() {
        //     var firstname = $('#firstname').val();
        //     var lastname = $('#lastname').val();
        //     var email = $('#email').val();
        //     var mobile = $('#mobile').val();
        //     var gender = $('#gender').val();
        //     var image = $('#image').val();

        //     $.ajax({
        //         url: "updateajax.php",
        //         type: 'Post',
        //         data: {
        //             firstname: firstname,
        //             lastname: lastname,
        //             email: email,
        //             mobile: mobile,
        //             gender: gender,
        //             image: image
        //         },

        //         success: function(data, status) {
        //             readRecords();
        //         }

        //     });
        // }
        function addRecord() {
            // $("#add-form").on('submit', function(e) {
            // e.preventDefault();
            $.ajax({

                type: 'POST',
                url: 'updateajax.php',
                data: new FormData(this),
                // dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,

                success: function(data) {
                    // alert('Record successfully inserted...');

                    readRecords();

                }
            });
            // });
        }


        // Delete Records call

        function DeleteUser(deleteid) {
            var conf = confirm("Are You Sure Delete?");
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
                    $('#update_name').val(user.name);
                    $('#update_phone').val(user.phone);
                    $('#update_email').val(user.email);
                    $('#update_gender').val(user.gender);
                    $('#update_image').val(user.image);
                }
            );

            $('#update_user_modal').modal("show");
        }

        function updateUserdetail() {
            var name_upd = $('#update_name').val();
            var email_upd = $('#update_email').val();
            var phone_upd = $('#update_phone').val();
            var gender_upd = $('#update_gender').val();
            var image_upd = $('#update_image').val();

            var hidden_user_id_upd = $('#hidden_user_id').val();

            $.post("updateajax.php", {
                    hidden_user_id_upd: hidden_user_id_upd,
                    name_upd: name_upd,
                    email_upd: email_upd,
                    phone_upd: phone_upd,
                    gender_upd: gender_upd,
                    image_upd: image_upd
                },
                function(data, status) {
                    $('#update_user_modal').modal("hide");
                    readRecords();
                }

            );
        }

        // function updateUserdetail() {

        //     // e.preventDefault();

        //     $.post("updateajax.php", new FormData(this),
        //         function(data, status) {
        //             $('#update_user_modal').modal("hide");
        //             readRecords();
        //         },

        //     );


        // }
        </script>

    </body>

    </html>