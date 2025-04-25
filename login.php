<?php
// Connect to the database
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sigup";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Only proceed if the request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if required fields are set
    if (
        isset($_POST['name']) &&
        isset($_POST['email']) &&
        isset($_POST['password']) &&
        isset($_POST['confirmPassword'])
    ) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        // Check if passwords match
        if ($password !== $confirmPassword) {
            echo "Passwords do not match.";
            exit();
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM theepan WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Email already registered. Please login.";
            exit();
        }

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO theepan (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            // Redirect *before* output
            header("Location: login.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please fill out all required fields.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
