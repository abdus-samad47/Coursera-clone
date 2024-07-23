 Coursera Clone Project

This repository contains the files for a Coursera clone project. The project includes various HTML, CSS, JavaScript, and PHP files to emulate the functionalities of Coursera.

 Project Structure

 HTML Files

1. `coursera_login.html`: Login page for the Coursera clone.
2. `coursera_signup.html`: Signup page for new users.
3. `edit_profile.html`: Page to edit user profiles.
4. `enrollCourse.html`: Course enrollment page.
5. `freeCourseCheckout.html`: Checkout page for enrolling in free courses.
6. `freeCourses.html`: List of all free courses.
7. `index.html`: Homepage of the Coursera clone.
8. `makePayment.html`: Payment processing page.
9. `view.html`: Course view page that includes a video player.

 CSS Files

1. `dashboard.css`: Styles for the user dashboard.
2. `enrollCourse.css`: Styles for the course enrollment page.
3. `freeCourseStyle.css`: Styles for the free courses listing page.
4. `mypagesfooter.css`: Styles for the footer used in various pages.
5. `navBarStyle.css`: Styles for the navigation bar.
6. `responsive.css`: Responsive design styles for various pages.
7. `style.css`: General styles for the website.
8. `styleStudents.css`: Additional styles specifically for the students' pages.

 PHP Files

1. `course_detail.php`: Displays details of a specific course.
2. `dashboard.php`: User dashboard.
3. `db.php`: Database connection file.
4. `edit_profile.php`: Handles profile editing.
5. `enroll.php`: Handles course enrollment.
6. `fetch_course_categories.php`: Fetches course categories from the database.
7. `fetch_courses.php`: Fetches course information from the database.
8. `fetch_enrolled_courses.php`: Fetches courses the user is enrolled in.
9. `fetch_user_courses.php`: Fetches courses associated with the user.
10. `login.php`: Handles user login.
11. `logout.php`: Handles user logout.
12. `payment.php`: Processes payments.
13. `signup.php`: Handles user registration.

 SQL Files

1. `coursera_clone.sql`: SQL script to set up the database for the Coursera clone project.

 Features

- User authentication (login and signup).
- Course enrollment and tracking.
- Viewing and managing user profiles.
- Viewing course details and contents.
- Payment processing for paid courses.
- Responsive design for better accessibility across devices.

 Getting Started

 Prerequisites

- A web server with PHP support.
- MySQL database.

 Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/yourusername/coursera-clone.git
    ```

2. Import the SQL file (`coursera_clone.sql`) into your MySQL database to set up the necessary tables.

3. Configure the database connection in `db.php` file:

    ```php
    <?php
    $servername = "your_server";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    ```

4. Deploy the files to your web server.

 Usage

- Access the homepage at `http://yourserver/index.html`.
- Register a new account or login with existing credentials.
- Browse courses, enroll in them, and start learning.

 Contributing

If you would like to contribute to this project, please fork the repository and submit a pull request with your changes.

 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

 Acknowledgments

- Inspiration from [Coursera](https://www.coursera.org/).

