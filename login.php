<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Sanitize input
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
            exit();
        }

        // Prepare SQL statement
        $sql = "SELECT user_id, username, password FROM users WHERE email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($user_id, $username, $hashed_password);
                $stmt->fetch();

                // Verify password
                if (password_verify($password, $hashed_password)) {
                    // Start session and set session variables
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['username'] = $username;

                    echo "success";
                } else {
                    echo "Invalid email or password";
                }
            } else {
                echo "Invalid email or password";
            }

            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}
?>