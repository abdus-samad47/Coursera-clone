<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT c.course_id, c.course_name, c.duration, c.level, c.uni_image AS image, u.uni_name, e.enrollment_date
        FROM courses c
        JOIN enrollments e ON c.course_id = e.course_id
        JOIN universities u ON c.uni_id = u.uni_id
        WHERE e.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$courses = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
}
$stmt->close();
$conn->close();
echo json_encode($courses);
?>