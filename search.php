<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="search.php">Search A File</a>
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
      <li class="nav-item active">
        <a class="nav-link" href="search.php">Find-Materials</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ask.php">Ask-For-Materials</a>
      </li>

      
     
    </ul>
  </div>
</nav>

   
    <title>Find Materials</title>
  </head>
  <body>
  <br>
  <form action="search.php" method="post" enctype="multipart/form-data">
  <select class="custom-select custom-select-sm" required name='standard'>
  <option selected>Select Class</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
</select>
  <br>
  <br>

<select class="custom-select custom-select-sm" required name='sub'>
<option selected>Choose Subject</option>
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
<br>
  <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
  <button type="submit" name="submit" class="btn btn-outline-success btn-lg btn-block">Search</button>
</form>
  <hr color="white">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="index.js"></script>
  </body>
</html>
 <!-- Bootstrap CSS -->
 
 
<?php
  error_reporting(0);
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "data";

if(isset($_POST['submit'])){
  $server = "localhost";
    $usernamee = "root";
    $passwordd = "";
    // Create a database connection
    $con = mysqli_connect($server, $usernamee, $passwordd);
    $subject = $_POST['sub'];
    $class = $_POST['standard'];
    $sql = "INSERT INTO `data`.`history` (`standard`, `subject`) VALUES ('$class', '$subject')";
    if($con->query($sql) == true){
      // echo "Successfully inserted";

      // Flag for successful insertion
      $insert = true;
  }
  else{
      echo "ERROR: $sql <br> $con->error";
  }

  // Close the database connection
  $con->close();

}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name,class, section,subject,year,files FROM final WHERE class='$class' && subject='$subject'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<div style='overflow-x:auto;'><table><tr><th>Sent By</th><th>Class</th><th>File</th><th>Year</th><th>Subject</th><th>
  View File</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["name"]."</td><td>".$row["class"]." ".$row["section"]."<td>".$row["files"]."<td>".$row["year"]."<td>".$row["subject"]."<td>"."<a class='btn btn-secondary btn-sm' href='materials/$row[files]' role='button'>View File</a>"."</td></tr>";
  }
  echo "</table></div>";
} else {
  echo "<h2 color='white' style=color:'white'; align='center'>Choose A Class And Subject To Display Results<br>
  No Results Found </h2>";
}
$conn->close();
?>

<style>
table{
  border-collapse: collapse;
  border: 30px solid black;
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
  background-color: #d96459;
  border: 1px solid black;
}

td{
  border: 1px solid black;
}
tr:nth-child(even) {background-color:#f2f2f2;
color:black;
}
body{
    background-color: black;
}

</style>
