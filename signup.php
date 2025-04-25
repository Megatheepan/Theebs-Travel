<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "sigup";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Sanitize inputs
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    // Simple validation
    if ($name === '' || $email === '' || $password === '' || $confirmPassword === '') {
        echo "<h2>Please fill in all fields.</h2>";
        exit();
    }

    if ($password !== $confirmPassword) {
        echo "<h2>Passwords do not match.</h2>";
        exit();
    }

    // Check for existing email
    $checkEmail = "SELECT * FROM theepan WHERE email = '$email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        echo "<h2>Email already registered. <a href='login.html'>Click here to login</a>.</h2>";
        exit();
    }

    // Hash and insert
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO theepan (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "
            <h2>data save successful! 🎉</h2>
            <p>Your account has been created.</p>
            <a href='login.html'>Click here to login</a>
        ";
    } else {
        echo "<h2>Error saving user: " . $conn->error . "</h2>";
    }

    $conn->close();
} else {
    echo "<h2>Invalid access method.</h2>";
    exit();
}
?>
