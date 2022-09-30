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
 //echo "Success connecting to the db";


  // Collect post variables
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
    $phone = $_POST['phone'];
  $other = $_POST['other'];
  $sql = "INSERT INTO `collage`.`trip` (`name`, `age`, `gender`,`phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender','$phone', '$other', current_timestamp());";
   //echo $sql;


// Execute the query
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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    <title>collage Trip</title>
    
</head>
<body>
    
     <img class="bg" src="sgvu1.jpg" alt="sgvu">
     <div class="container">

    <h1>Suresh gyan vihar university Collage Trip form</h1>
    <p>Have a safe Trip(jaipur to Ladakh)</p>
    <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the Ladakh trip</p>";
        }
    ?>

    <form action="index.php" method="post">
     <input type="text" name="name" id="name" placeholder="Enter your name">
     <input type="text" name="age" id="age" placeholder="Enter your age">
     <input type="text" name="gender" id="gender" placeholder="Enter your gender">
              <input type="phone" name="phone" id="phone" placeholder="Enter your phone no">
     <textarea name="other" id="other" placeholder="other details" cols="30" rows="10"></textarea>
     <button class="btn">submit</button>


    </form>
</div>
     
    
</body>
</html>