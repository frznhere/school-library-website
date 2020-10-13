<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="index.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    body{
        margin-bottom:20px;
    }
    </style>
    <title>Upload A File</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="upload.php">Upload A File</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="upload.php">Contribute</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search.php">Find-Materials</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ask.php">Ask-For-Materials</a>
      </li>

      
     
    </ul>
  </div>
</nav>

<div class="container mt-4">
<h3>Please Upload Files Here:</h3>
<hr>
<form action="upload.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Name">
    <small id="emailHelp" class="form-text text-muted">Make Sure You Enter Your Complete Name </small>
  </div>
  <div class="form-group">
    <!-- <label for="exampleInputPassword1">Class</label>
    <input type="text" name="class" class="form-control" id="exampleInputPassword1" required placeholder="Class">-->
    <label for="exampleFormControlSelect1">Choose Class</label>
    <select class="form-control" name="class" required id="exampleFormControlSelect1">
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10</option>
      <option>11</option>
      <option>12</option>
    </select>
  </div> 

  <div class="form-group">
    <label for="exampleFormControlSelect1">Select Section</label>
    <select class="form-control" name="section" required id="exampleFormControlSelect1">
      <option>A</option>
      <option>B</option>
      <option>C</option>
      <option>D</option>
      <option>E</option>
    </select>
    <br>
    <label for="exampleFormControlSelect1">Select Subject</label>
    <select class="form-control" name="subject" required id="exampleFormControlSelect1">
    <option>Choose Subject</option>
  <option>English</option>
  <option>Hindi</option>
  <option>Maths</option>
  <option>Biology</option>
  <option>Physics</option>
  <option>Chemistry</option>
  <option>History</option>
  <option>Geography/Pol.Sci</option>
  <option>Economics</option>
  <option>German</option>
  <option>Tamil</option>
    </select>
    <br>
    <div class="input-group mb-3">
  
  <div class="custom-file">
    <input type="file" name="files" accept=".pdf, .jpeg, .png, .jpg" required class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
    <small id="emailHelp" class="form-text text-muted">Make Sure You Enter Your Complete Name</small>
  </div>
</div>
  </div>
  <small id="emailHelp" class="form-text text-muted">Make Sure You Send A PDF Or Image With It's Working name(Ex-English.pdf, German.jpeg etc..)</small>
  
  <br>
  <div class="form-group">
    <label for="exampleInputEmail1">Year</label>
    <input type="text" name="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    required placeholder="Question Paper's Year">
  </div>
  <button type="submit" class="btn btn-primary btn-lg">Upload</button>
  <br>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
error_reporting(0);
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
    $class = $_POST['class'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];    
    $filename = $_FILES['files']['name'];
    $temp_name = $_FILES['files']['tmp_name'];
    $folder = "materials/".$filename;
    $year = $_POST['year'];
    move_uploaded_file($temp_name, $folder);
    $sql = "INSERT INTO `data`.`final` (`name`, `class`, `section`,`subject`, `files`, `year`) 
    VALUES ('$name', '$class', '$section','$subject', '$filename','$year')";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}


?>
