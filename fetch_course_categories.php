<?php
include 'db.php';

// Fetch course categories
$sql = "SELECT * FROM course_category";
$result = $conn->query($sql);

// Fetch the number of courses in each category
$course_counts = [];
$course_sql = "SELECT category_id, COUNT(*) as count FROM courses GROUP BY category_id";
$course_result = $conn->query($course_sql);
while ($row = $course_result->fetch_assoc()) {
    $course_counts[$row['category_id']] = $row['count'];
}

// Store the fetched data in an array
$categories = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];
        $course_count = isset($course_counts[$category_id]) ? $course_counts[$category_id] : 0;

        $categories[] = [
            'category_name' => $category_name,
            'course_count' => $course_count
        ];
    }
}

// Close the database connection
$conn->close();

// Return the categories data
return $categories;
?>
