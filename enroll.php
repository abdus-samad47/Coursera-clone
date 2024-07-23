<?php
session_start(); 
include 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<p>You need to login to enroll in a course.</p>";
    exit();
}

if (isset($_GET['course_id'])) {
    $course_id = intval($_GET['course_id']);
    $user_id = $_SESSION['user_id']; 

    // Check if the user is already enrolled in the course
    $checkStmt = $conn->prepare("SELECT * FROM enrollments WHERE user_id = ? AND course_id = ?");
    $checkStmt->bind_param("ii", $user_id, $course_id);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    
    if ($checkResult->num_rows > 0) {
        // User is already enrolled in the course
        $message = "You are already enrolled in this course.";
    } else {
        // User is not enrolled, proceed with the enrollment
        $stmt = $conn->prepare("INSERT INTO enrollments (user_id, course_id, enrollment_date) VALUES (?, ?, CURDATE())");
        $stmt->bind_param("ii", $user_id, $course_id);

        // Execute the statement and check if the enrollment is successful
        if ($stmt->execute()) {
            $message = "You have successfully enrolled in the course!";
        } else {
            $message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $checkStmt->close();
} else {
    $message = "No course selected for enrollment.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enrollment Confirmation</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> 
    <link rel="stylesheet" href="mypagesfooter.css">
    <link rel="stylesheet" href="navBarStyle.css">
</head>
<body>
    
    <div class="enrollment-confirmation">
        <h1>Enrollment Confirmation</h1>
        <p><?php echo $message; ?></p>
        <button onclick="location.href='dashboard.php';">Go Back</button>
    </div>
</body>
</html>
