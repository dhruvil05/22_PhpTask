<?php
require 'db_connect.php';
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
<?php 

if(isset($_GET['sno'])){
    // var_dump($_GET['sno']);

    $sno = $_GET['sno'];
    
    $sql = "SELECT * FROM `data` WHERE `sno` = $sno";
    
    $result= mysqli_query($conn, $sql);
    if(!$result){
        echo("Error description: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
}

?>

<body>
    <div class="container">

        <form action="add_user.php" method="post" enctype="multipart/form-data">
            <u>
                <h2>Add User</h2>
            </u>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <span class="error">*
                    <?php echo $nameErr;?>
                </span>
                <input type="char" class="form-control" id="username"
                    value="<?php if(isset($row)){ echo $row['name']; }?>" name="username">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <span class="error">*
                    <?php echo $emailErr;?>
                </span>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="<?php if(isset($row)){ echo $row['email']; }?>" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="mobileNo" class="form-label">Mobile No</label>
                <input type="tell" class="form-control" id="phoneNo"
                    value="<?php if(isset($row)){ echo $row['phone']; }?>" name="phone">

            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id=" gendermale"
                    <?php if(isset($row)&&$row['gender']== 'male'){?> checked <?php  }?> value="male">
                <label class=" form-check-label" for="flexRadioDefault1">Male</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="genderfemale"
                    <?php if(isset($row)&&$row['gender'] == 'female'){?> checked <?php }if(!isset($row)){?> checked
                    <?php }?>value="female">
                <label class="form-check-label" for="flexRadioDefault2">Female</label>
            </div>

            <div class="mb-3">
                <br>
                <input type="file" class="form-control" id="img" name="image" accept="image/x-png,image/gif,image/jpeg">

            </div>
            <input type="hidden" value="<?php if(isset($row)){ echo $row['sno']; }?>" name="sno">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a href="index.php"><button type="button" class="btn btn-secondary" id="close">Cancel</button></a>
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