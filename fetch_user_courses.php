<?php
session_start();
include 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Please log in to access your courses.";
    exit();
}

$user_id = $_SESSION['user_id'];

// Prepare a SQL statement to fetch courses the user is enrolled in
$sql = "SELECT courses.course_id, courses.course_name, courses.description, universities.uni_name
        FROM enrollments
        JOIN courses ON enrollments.course_id = courses.course_id
        JOIN universities ON courses.uni_id = universities.uni_id
        WHERE enrollments.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$courses = [];
while ($row = $result->fetch_assoc()) {
    $courses[] = $row;
}

$stmt->close();
$conn->close();

return $courses;
?>
