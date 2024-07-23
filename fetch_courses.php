<?php
include 'db.php'; 

function fetchCourses() {
    global $conn;  
    $sql = "SELECT courses.*, universities.uni_name, course_category.category_name
            FROM courses
            JOIN universities ON courses.uni_id = universities.uni_id
            JOIN course_category ON courses.category_id = course_category.category_id";
    $result = $conn->query($sql);

    $courses = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
    }
    return $courses;
}
?>
