<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="index.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <style>
    body{
        margin-bottom:20px;
    }
    </style>
    <title>Ask For A File</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="ask.php">Ask For File</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="upload.php">Contribute</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search.php">Find-Materials</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="ask.php">Ask-For-Materials</a>
      </li>

      
     
    </ul>
  </div>
</nav>

<div class="container mt-4">
<h3>Please Ask For Files Here:</h3>
<hr>
<form action="ask.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" required aria-desc2ribedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Make Sure To Enter Full Name</small>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Standard</label>
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
    <label for="exampleFormControlTextarea1">What Do You Need</label>
    <textarea class="form-control" name="desc2" id="exampleFormControlTextarea1" placeholder="I need ..... of class.... as soon as possible. "
     rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-dark btn-lg">Submit</button>
</form>

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
    $desc2 = str_replace("'", " ",$_POST['desc2']);
    $sql = "INSERT INTO `data`.`ask` (`name`, `class`, `desc2`) 
    VALUES ('$name', '$class', '$desc2')";
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
$server = "localhost";
$username = "root";
$password = "";
$dbname = "data";
$conn = new mysqli($server, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name,class,desc2 FROM ask";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo"<br><br><h3>Hello There, Some People Require Your Help. Please Do If You Can, Regards.</h3>
  <hr>";
  echo "<div style='overflow-x:auto;'><table class='table table-dark'><tr><th scope='col'>Sent By</th><th scope='col'>Class</th><th scope='col'>Description</th><th scope='col'></th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["name"]."</td><td>".$row["class"]."<td>".$row["desc2"]."<td>"."<a class='btn btn-secondary btn-sm' href='upload.php' role='button'>Help</a>"."</td></tr>";  
  }
  echo "</table></div>";
} else {
  echo "<h2 color='white' style=color:'white'; align='center'>No Results Found </h2>";
}
$conn->close();
?>

<style>
table{
  border-collapse: collapse;
  border: 2px solid black;
  width: 100%;
  color: white;
  font-family:monospace;
  font-size:25px;
  text-align:center;
  background-color:#d96459;
  margin-top:20px;  
  margin-left:auto; 
  margin-right:auto;
  
}
th{
  background-color: #454d55;
  border: 1px solid black;
}

td{
  border: 1px solid black;
}
tr:nth-child(even) {background-color:#f2f2f2;
color:black;
}

//Second Part Displaying Queries
?>