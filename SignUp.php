<?php
// Connect to the database
// $servername = "localhost";
// $username = "your_username";
// $password = "your_password";
// $dbname = "db";
// $conn = new mysqli($servername, $username, $password, $dbname);
$con = mysqli_connect('localhost', 'root', '','db');

// Retrieve form data
$firstName = $_POST['firstnameinputsignup'];
$lastName = $_POST['lastnameinputsignup'];
$email = $_POST['emailinputsignup'];
$password = $_POST['passwordinputsignup'];
$role = $_POST['roles'];

// database insert SQL code
$sql = "INSERT INTO `db` (`firstName`, `lastName`, `email`, `passwordAcc`, `role`) VALUES ('$firstName', '$lastName', '$email', '$password', `$role`);"

// insert in database 
$rs = mysqli_query($con, $sql);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the 'account' table
$sql = "INSERT INTO account (`userID`, `firstName`, `lastName`, `email`, `passwordAcc`, `phoneNum`, `role`) 
        VALUES ('1', '$firstName', '$lastName', '$email', '$password', 'NULL', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
    echo '<script>window.location.href = "login.html";</script>';
exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
