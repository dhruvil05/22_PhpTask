<?php
require 'db_connect.php';
//  require 'insert.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>add data</title>

    <style>
    .container {

        width: 500px;

    }

    .error {
        color: red;
    }

    .form-control {}
    </style>
</head>
<?php 

if(isset($_GET['sno'])){
    
    $sno = $_GET['sno'];
    $sql = "SELECT * FROM `data` WHERE `sno` = $sno";

    $result= mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // var_dump($row);
}

?>

<body>
    <div class="container">

        <form action="" method="post" enctype="multipart/form-data" id="add-form">
            <u>
                <h2>Add User</h2>
            </u>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <!-- <span class="error">*
                    <?php echo $nameErr;?>
                </span> -->
                <input type="text" class="form-control username" id="username"
                    value="<?php if(isset($row)){ echo $row['name']; }?>" name="username">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <!-- <span class="error">*
                    <?php echo $emailErr;?>
                </span> -->
                <input type="email" class="form-control" aria-describedby="emailHelp"
                    value="<?php if(isset($row)){ echo $row['email']; }?>" name="email" id="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">

                <label for="mobileNo" class="form-label">Mobile No</label>
                <!-- <span class="error">*
                    <?php echo $phoneErr;?>
                </span> -->
                <input type="number" class="form-control" id="phone"
                    value="<?php if(isset($row)){ echo $row['phone']; }?>" max='9999999999' min='1000000000'
                    name="phone">

            </div>

            <div class="form-check">
                <input class="form-check-input gender" type="radio" name="gender" id="gender"
                    <?php if(isset($row)&&$row['gender'] == 'male'){?> checked <?php  }?> value="male">
                <label class=" form-check-label" for="flexRadioDefault1">Male</label>
            </div>
            <div class="form-check">
                <input class="form-check-input gender" type="radio" name="gender" id="gender"
                    <?php if(isset($row)&&$row['gender'] == 'female'){?> checked <?php }if(!isset($row)){?> checked
                    <?php }?>value="female">
                <label class="form-check-label" for="flexRadioDefault2">Female</label>
            </div>

            <div class="mb-3">
                <br>
                <input type="file" class="form-control" id="img" name="image" accept="image/x-png,image/gif,image/jpeg">

            </div>
            <input type="hidden" value="<?php if(isset($row)){ echo $row['sno']; }?>" name="sno">
            <button type="submit" class="btn btn-primary" name="submit" id="form-submit-btn">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>


    <script>
    $(document).ready(function() {
        $('#form-submit-btn').submit(function(e) {
            e.preventDefault();
            var name = $(".username").val();
            var phone = $("#phone").val();
            var email = $("#email").val();
            var gender = $("#gender:checked").val();
            // var image = $("#img").val();
            // imagename = image.split(/(\\|\/)/g).pop();
            // var fd = new FormData();
            // var images = $('#img')[0].files;



            if (name.length < 1) {
                $('.username').after('<span class="error">This field is required</span>');
            }
            if (phone.length < 9) {
                $('#phone').after('<span class="error">This field required (10 digit)</span>');
            }
            if (email.length < 1) {
                $('#email').after('<span class="error">This field is required</span>');
            } else {
                var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;
                var validEmail = regEx.test(email);
                if (!validEmail) {
                    $('#email').after('<span class="error">Enter a valid email</span>');
                }
            }

        });
        $('form[id="add-form"]').validate({
            rules: {
                username: 'required',
                phone: 'required',
                email: {
                    required: true,
                    email: true,
                },

            },
            messages: {
                username: 'This field is required',
                phone: 'This field is required (10 digit)',
                email: 'Enter a valid email',

            },

            submitHandler: function(form) {
                var name = $(".username").val();
                var phone = $("#phone").val();
                var email = $("#email").val();
                var gender = $("#gender:checked").val();
                // var fd = new FormData();
                // var images = $('#img')[0].files;
                // fd.append('name', name);
                // fd.append('phone', phone);
                // fd.append('email', email);
                // fd.append('gender', gender);
                // fd.append('img', images[0]);
                // alert(fd);
                $.ajax({

                    type: "POST",
                    url: "http://localhost/php/phptask/store.php",
                    data: {
                        name: name,
                        phone: phone,
                        email: email,
                        gender: gender,

                    },

                    success: function(data) {
                        console.log(data);
                        alert('Record successfully inserted...');
                        location.href = "http://localhost/php/phptask/index.php";
                    },


                    error: function(xhr, status, error) {
                        alert(error);
                        console.error(xhr);
                    }
                });



            }
        });


    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    // $("#add-form").on('submit', function(e) {
    //     e.preventDefault();
    //     $.ajax({
    //         type: 'POST',
    //         url: 'http://localhost/php/phptask/store.php',
    //         data: new FormData(this),
    //         dataType: 'json',
    //         contentType: false,
    //         cache: false,
    //         processData: false,
    //         beforeSend: function() {

    //         },
    //         success: function(response) { //console.log(response);
    //             alert("IN")
    //         }
    //     });
    // });
    </script>



</body>

</html>