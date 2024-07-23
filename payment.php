<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo "Please log in to proceed.";
    exit;
}

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

if (!$course_id) {
    echo "No course selected.";
    exit;
}

// Fetch course details to display in payment info
$stmt = $conn->prepare("SELECT course_name, fees FROM courses WHERE course_id = ?");
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();
$course = $result->fetch_assoc();

if (!$course) {
    echo "Course not found.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment for Course</title>
    <style>
body{
    font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif;
}
     .cont{
        width: 20%;
        margin: 50px auto;
        border:1px solid black;
        padding: 3%;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);
        background-color: white;
    }
    input{
        display: block;
        margin-top: 5px;
        margin-bottom: 10px;
    }
    .pdc{
        width: 80%;
        margin: auto;
        display: flex;
        flex-direction: row;
        flex-basis: 22%;
        gap: 4%;
    }
    img{
        width: 80%;
        height: 50px;
    }
    .sbt{
            width: 100%;
            height: 30px;
            padding: 5px 10px;
            font-size: 16px;
            background-color: blue;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            margin-top: 40px;
        }
        .sbt:hover{
            background-color: navy;
        }
</style>
</head>
<body>
        
        <!-- Payment Form Setup for Processing Payments -->
        <div class="pdc">
        <div class="logo-c"><img src="https://d3njjcbhbojbot.cloudfront.net/web/images/signature/cc/upi.png" alt="paymentDoor"></div>
        <div class="logo-c"><img src="https://d3njjcbhbojbot.cloudfront.net/web/images/signature/cc/visa-2.png"></div>
        <div class="logo-c"><img src="https://d3njjcbhbojbot.cloudfront.net/web/images/signature/cc/netbanking.png"></div>
        <div class="logo-c"><img src="https://d3njjcbhbojbot.cloudfront.net/web/images/signature/cc/mastercard-2.png"></div>
    </div>
    <div class="payment-info">
            <h1>Payment for: <?php echo htmlspecialchars($course['course_name']); ?></h1>
            <h3>Course Fee: $<?php echo number_format($course['fees'], 2); ?></h3>
        </div>
        <div class="cont">
        
                <form onsubmit="makepayment(event)">
                    <label for="card">Enter your Card Number</label>
                    <input type="text" id="card" placeholder="xxxx xxxx xxxx" required>

                    <label for="date">Expiry Date</label>
                    <input type="date" id="date" required>

                    <label for="pin">Enter CVV Number</label>
                    <input type="password" id="pin" placeholder="xxx" required>

                    <label for="cardH">Card Holder:</label>
                    <input type="text" id="cardH" placeholder="Name" required>

                    <button onclick="location.href='enroll.php?course_id=<?php echo $course_id; ?>'">Enroll in this course</button>

                </form>
        </div>

</body>
</html>
