<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required fields are set
    if (isset($_POST['fullname'], $_POST['email'], $_POST['password'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate and sanitize input
        $fullname = htmlspecialchars(strip_tags($fullname));
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
            exit();
        }
        
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // SQL to insert new user
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

        // Prepare statement
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sss", $fullname, $email, $hashed_password);

            // Execute statement
            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }

        // Close connection
        $conn->close();
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}
?>
