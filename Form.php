<?php
$insert=false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";


$con = mysqli_connect($server, $username, $password);

if (!$con) {
    die("Connection to the database server failed due to " . mysqli_connect_error());
}

// echo "Success connecting to the database.";
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];
$sql="INSERT INTO `travel`.`travel` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `DateTime`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
//echo $sql;

if($con->query($sql)==true){
  //  echo "Successfully inserted";
  $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To The Travel Form</title>
    
    <link rel="stylesheet" href="Travel.css">
</head>
<body>
   
    <div class="container">
        <h3>Welcome to Arya College udaipur Trip form</h3>
        <p>Enter your details </p>
        <?php
        if($insert==true){
        echo"<p class='submitMsg'>Thanks For Submitting your form.</p>";
        }
        ?>
        <form action="Form.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter Your Name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender"> 
        <input type="email" name="email" id="email" placeholder="Enter your email"> 
        <input type="phone" name="phone" id="phone" placeholder="phone">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
        <button class="button">Submit</button>
        
       
    </form>
  
      </div>
      <script src="Travel.js"></script>
     
</body>
</html>