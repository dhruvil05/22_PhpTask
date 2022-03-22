<?php
 require 'insert.php';
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

    <title>fill the form</title>

    <style>
    .container {

        width: 500px;

    }

    .error {
        color: red;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <form action="add_user.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <span class="error">*
                    <?php echo $nameErr;?>
                </span>
                <input type="char" class="form-control" id="username" name="username">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <span class="error">*
                    <?php echo $emailErr;?>
                </span>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="mobileNo" class="form-label">Mobile No</label>
                <input type="tell" class="form-control" id="mobileNo" name="mobile">

            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender"" id=" gendermale" value="male">
                <label class=" form-check-label" for="flexRadioDefault1">Male</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="genderfemale" value="female" checked>
                <label class="form-check-label" for="flexRadioDefault2">Female</label>
            </div>

            <div class="mb-3">
                <br>
                <input type="file" class="form-control" id="img" name="image">

            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a href="index.php"><button type="button" class="btn btn-secondary" id="close">Close</button></a>
        </form>
    </div>

    <!-- <script>
       var btn = document.getElementById("close").addEventListener(onclick, (index)=>{
           header("location: index.php");
       })

       $("#close").click(function(){
           header('location: index.php');
       });
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>



</body>

</html>