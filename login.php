<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate the email and password
    if (validateEmail($email) && validatePassword($password)) {
        // Valid credentials, perform login logic here

        // For demonstration purposes, let's assume the login is successful
        echo "Login successful!";
        echo '<script>window.location.href = "dashboard.html";</script>';
        // exit();
    } else {
        // Invalid credentials, display an error message
        echo "Invalid email or password.";
    }
}

// Function to validate the email
function validateEmail($email) {
    // Email validation logic
    $emailRegex = '/^[\w.-]+@([\w-]+\.)+[\w]{2,}$/';
    return preg_match($emailRegex, $email);
}

// Function to validate the password
function validatePassword($password) {
    // Password validation logic
    return strlen($password) >= 8;
}
?>
