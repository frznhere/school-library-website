<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $state = $_POST['state'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $insta = $_POST['insta'];
    $sql = "INSERT INTO `forever`.`data` (`name`, `email`, `age`, `state`, `phone`, `sex`, `insta`, `dt`) VALUES ('$name', '$email', '$age', '$state', '$phone', '$gender','$insta',current_timestamp())";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
        header("Location:success.html");
    }
    else{
        echo "ERROR: $sql <br> $con->error";
        header("Location:failed.html");
    }

    // Close the database connection
    $con->close();
}
?>


<!doctype html>
<html lang="en">
  <head>
  <script src="script.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    .btn2{
  background-color: green; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;

  
}
    .btn2:hover{
      background-color: rgb(0, 90, 0);
      transition-duration:0.4s;
      color:white;
      border-width:2px;
    }
    </style>
    <title>Join Us! -Achievers Club</title>
    <link rel="icon" href="logoftab.png" type="image/x-icon">

  </head>
  <body>
  <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.html">
        <img src="logoftab.png" width="35" height="35" class="d-inline-block align-top" alt="" loading="lazy">
        <img src="achiever.png" width="200" height="40" class="d-inline-block align-top" alt="" loading="lazy">
      
      </a>
    </nav>
<div class="container mt-4">
<h3>Please Submit Asked Details Here:</h3>
<hr>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" name="name" id="inputEmail4" placeholder="Name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email" class="form-control" name ="email" id="inputEmail4" placeholder="E-Mail" required>
    </div>
  </div>
  <div class="form-group">
      <label for="inputPassword4">Age</label>
      <input type="number" class="form-control" name ="age" id="inputPassword" placeholder="Age" required>
    </div>
  <div class="form-group">
    <label for="inputAddress2">State</label>
    <input type="text" class="form-control" name="state" id="inputAddress2" placeholder="Currently Living In" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Phone no.</label>
      <input type="number" class="form-control" name="phone" id="inputCity" placeholder="For Contact"required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Sex</label>
      <select id="inputState" name="gender" class="form-control" required>
        <option selected>Female</option>
        <option>Male</option>
        <option>Others</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Instagram ID</label>
      <input type="text" class="form-control" name="insta" id="inputZip" placeholder="Insta ID" required>
    </div>
  </div>
  <div class="form-group">
    <!-- <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div> -->
  </div>
  <button type="submit" class="btn2">Submit</button>

</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </body>
</html>

