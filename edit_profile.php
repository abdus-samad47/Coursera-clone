<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $userId = $_SESSION['user_id']; 

    // Fetch the current password from the database
    $query = "SELECT password FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Verify old password
    if (password_verify($old_password, $hashed_password)) {
        if ($new_password == $confirm_password) {
            // Hash the new password
            $new_hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            // Update password in the database
            $update_query = "UPDATE users SET password = ? WHERE user_id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("si", $new_hashed_password, $userId);
            if ($stmt->execute()) {
                echo "<script>alert('Password updated successfully.'); window.location.href = 'dashboard.php';</script>";
            } else {
                echo "<script>alert('Error updating password.'); window.location.href = 'dashboard.php';</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('New passwords do not match.'); window.location.href = 'dashboard.php';</script>";
        }
    } else {
        echo "<script>alert('Old password is incorrect.'); window.location.href = 'dashboard.php';</script>";
    }
}
?>
