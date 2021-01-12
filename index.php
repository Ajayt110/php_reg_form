<?php
$insert = false;
    if(isset($_POST['name'])){
    // Set connection variables
        $server = "localhost:3307";
        $username = "root";
        $password = "";

        // Create a database connection
        $connection = mysqli_connect($server, $username, $password);

        // Check for connection success
        if(!$connection){
            die("connection to this database failed due to" . mysqli_connect_error());
        }
        
        //echo "Success connecting to the db";

        // Collect post variables
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $other = $_POST['other'];
        $sql = "INSERT INTO `php_test`.`registration_db` (`name`, `age`, `gender`, `email`, `mobile`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$mobile', '$other', current_timestamp());";
        //echo $sql;

        if($connection->query($sql)==true) {
            //echo "success";
            $insert=true;
        }
        else
            echo "ERROR: $sql <br> $connection->error";

        $connection->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg1.webp" alt="background Image">
    <div class="container">
        <h1>Registration form</h3>
        <p>Enter your details and submit this form to complete registration!</p>
        <?php 
        if($insert==true)
        echo "<p class='confirm' style='color: green; font-size: large;'>Thanks for submitting your form.</p>";
        ?>
    
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="mobile" id="phone" placeholder="Enter your phone">
            <textarea name="other" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>

</html>