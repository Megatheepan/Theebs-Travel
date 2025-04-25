<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "sigup"; // Make sure this matches your DB

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Check DB connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and assign form data
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $mobile = isset($_POST['mobile']) ? mysqli_real_escape_string($conn, $_POST['mobile']) : '';
    $message = isset($_POST['message']) ? mysqli_real_escape_string($conn, $_POST['message']) : '';

    // Simple validation
    if ($name === '' || $email === '' || $mobile === '' || $message === '') {
        echo "<h2>Please fill in all fields.</h2>";
        exit();
    }

    // Insert query
    $sql = "INSERT INTO contacts (name, email, mobile, message)
            VALUES ('$name', '$email', '$mobile', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Thank you, $name! Your message has been sent successfully. 😊</h2>
              <p><a href='contact.html'>Go back to contact page</a></p>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "<h2>Invalid request method.</h2>";
    exit();
}
?>
