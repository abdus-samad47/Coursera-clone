<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
include 'fetch_courses.php'; 

$courses = fetchCourses(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://d3njjcbhbojbot.cloudfront.net/web/images/favicons/favicon-v2-96x96.png" sizes="96x96">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="styleStudents.css">
    <title>Dashboard</title>
</head>
<body>
<div class="container">
    <div class="nav-bar">
        <div class="left">
            <div>
                <img class="nav" id="logo" src="img/coursera logo 2.png" alt="logo">
            </div>
            <div id="search">
                <input type="text" id="search_input" placeholder="What do you want to learn ?">
            </div>
            <div id="icon_search">
                <img src="img/search.png" class="search_icon" alt="search">
            </div>
        </div>
        <div style="margin-right: 70px;">
        <div class="dropdown">
    <button class="dropbtn">Profile</button>
    <div class="dropdown-content">
        <a href="edit_profile.html">Edit Profile</a>
        <form action="logout.php" method="POST" style="margin: 0;">
            <button type="submit" class="dropdown-logout">Logout</button>
        </form>
    </div>
</div>

</div>

        
</div>
    </div>
    <div id="mid">
        <nav>
            <ul>
                <li><a href="#" class="tablink" onclick="openTab(event, 'Home')">Home</a></li>
                <li><a href="#" class="tablink" onclick="openTab(event, 'OnlineDegrees')">Enroll In Course</a></li>
                <li><a href="#" class="tablink" onclick="openTab(event, 'MyLearning')">My Learning</a></li>
            </ul>
            <hr class="hed">
            <div id="Home" class="tabcontent">
                <div id="firstdiv">
                    <div id="firstdiv_cont">
                        <div id="share">
                            <div id="round"><img src="img/share.png" alt=""></div>
                            <div id="sharetxt"> Share</div>
                        </div>
                        <div class="f_clear"></div>
                        <div id="firstdiv_left">
                            <div id="upper">
                                <h1 id="thekedar">University and college students, learn job-ready skills for free with Coursera for Campus</h1>
                                <p>Our free Coursera for Campus Student plan helps you build skills to add to your resume with unlimited Guided Projects and 1 free course per year</p>
                            </div>
                            <div id="lower2">
                                <p>Enter your school email to get started.</p>
                                <br>
                                <p>Ensure the address is correct before submitting. You will be required to verify your address before joining the program.</p>
                                <br>
                                <div id="input_start"><input type="text" id="injustified"> <button>Start</button></div>
                                <div class="f_clear"><br></div>
                                <div id="lwer"><a href="https://www.coursera.org/campus/basic/?utm_campaign=c4s&utm_content=c4cs-hero-cta-to-basic&utm_medium=website&utm_source=for-university-and-college-students">Working at a university? See how to help your school.</a></div>
                            </div>
                        </div>
                        <div id="firstdiv_right">
                            <img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera_assets.s3.amazonaws.com/student-upswell/header-marketing.png?auto=format%2Ccompress&dpr=2&w=&h=" alt="">
                        </div>
                        <div class="f_clear"></div>
                    </div>
                </div>
                <div id="uni">
                    <h6 id="hwe">Try a free course today from one of 200+ world-class universities and companies</h6>
                    <div><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera_assets.s3.amazonaws.com/front-page-story/partners/yale.png?auto=format%2Ccompress&dpr=2&w=&h=37" alt=""></div>
                    <div><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera_assets.s3.amazonaws.com/front-page-story/partners/google.png?auto=format%2Ccompress&dpr=2&w=&h=37" alt=""></div>
                    <div><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera_assets.s3.amazonaws.com/front-page-story/partners/UoL.png?auto=format%2Ccompress&dpr=2&w=&h=37" alt=""></div>
                    <div><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera_assets.s3.amazonaws.com/coursera_plus/sas-logo.png?auto=format%2Ccompress&dpr=2&w=&h=32" alt=""></div>
                    <div><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera_assets.s3.amazonaws.com/front-page-story/partners/duke.svg?auto=format%2Ccompress&dpr=2&w=&h=37" alt=""></div>
                    <div id="ibm"><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera_assets.s3.amazonaws.com/coursera_plus/IBM_logo.png?auto=format%2Ccompress&dpr=2&w=&h=70" alt=""></div>
                    <div><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera_assets.s3.amazonaws.com/front-page-story/partners/isb.png?auto=format%2Ccompress&dpr=2&w=&h=37" alt=""></div>
                    <div><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera_assets.s3.amazonaws.com/front-page-story/partners/tecnologico-de-monterrey.png?auto=format%2Ccompress&dpr=2&w=&h=37" alt=""></div>
                </div>

                <div id="com">
                    <div id=com_head>
                        <h1>Master in-demand skills quickly</h1>
                        <p>Build and practice skills that will set your resume apart</p>
                    </div>
                    <div id="com_body">
                        <div class="com_box">
                            <div class="icon2">
                                <img class="img_icon" alt="Deliver on strategic business goals by building critical skills " src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera_assets.s3.amazonaws.com/coursera_plus/landing_page/university.png?auto=format%2Ccompress&dpr=2&w=&h=55">
                            </div>
                            <p class="com_det">Learn from top instructors</p>
                            <p class="comma">Stream on-demand video lectures from leading universities and companies like Yale, Google, IBM, and more.</p>
                        </div>
                        <div class="com_box">
                            <div class="icon2">
                                <img class="img_icon" alt="Realize the full value of technology investments " src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera_assets.s3.amazonaws.com/coursera_plus/landing_page/head.png?auto=format%2Ccompress&dpr=2&w=&h=55">
                            </div>
                            <p class="com_det">Gain skills through hands-on learning</p>
                            <p class="comma">Learn in-demand skills in data science, design, project management, digital marketing, and more in under two hours with Guided Projects.</p>
                        </div>
                        <div class="com_box">
                            <div class="icon2">
                                <img class="img_icon" alt="Build a data-driven, digitally-fluent workforce " src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera_assets.s3.amazonaws.com/coursera_plus/landing_page/certificate.png?auto=format%2Ccompress&dpr=2&w=&h=40">
                            </div>
                            <p class="com_det">Earn and share a valued certificate</p>
                            <p class="comma">Showcase your new abilities with a certificate for a course, Guided Project, or Professional Certificate.</p>
                        </div>
                    </div>
                </div>
                <div id="testimonial">
                    <div id="tees">
                        <div id="testpic"> 
                            <img src="img/testimonial.png" alt="testimonial">
                        </div>
                        <div id="testimonText">
                            <div id="invertedComma">“</div>
                            <div id="tText">
                                <p class="_ktstll"><span><strong>I was able to apply to an internship because of a new skill I developed with a Coursera course!</strong> It may be a small step for some people, but before, I wasn't even able to apply, and now, <strong>I have opened many doors for my professional future!</strong></span></p>
                                <br>
                                <p>- Isabella Venturim Teixeira</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="percentage">
                    <h1>More than 70 million people are already learning on Coursera.</h1>
                    <p>See how they're achieving their goals:</p>
                    <div>
                        <div class="boxp">
                            <div class="bigp">87%</div>
                            <div class="bigptext"><span><strong>of career seekers report benefits</strong> like launching a career path or starting a new career</span></div>
                        </div>
                        <div class="boxp">
                            <div class="bigp">92%</div>
                            <div class="bigptext"><span><strong>of education seekers report benefits</strong> like successfully preparing for an exam or committing to an area of study</span></div>
                        </div>
                        <div class="boxp">
                            <div class="bigp">78%</div>
                            <div class="bigptext"><span><strong>of all learners report more confidence</strong> after learning on Coursera</span></div>
                        </div>
                    </div>
                    <p>Source: Coursera Learner Outcomes Survey* 2020</p>
                    <p id="gfligft">*The Coursera Learner Outcomes Survey is sent to learners 6 months after they complete a course on Coursera.</p>
                </div>
            </div>

            <div id="MyLearning" class="tabcontent">
                <h1>My Learning</h1>
                <div id="enrolledCourses" class="course-container"></div>

            </div>

            <div id="OnlineDegrees" class="tabcontent">
                <h1>Available Courses</h1>
                <?php foreach ($courses as $course): ?>
                    <div class="course-card">
                        <div class="course-image" style="background-image: url('<?php echo htmlspecialchars($course['uni_image']); ?>');"></div>
                        <div class="course-details">
                            <h2><?php echo htmlspecialchars($course['course_name']); ?></h2>
                            <p><?php echo htmlspecialchars($course['description']); ?></p>
                            <p>Category: <?php echo htmlspecialchars($course['category_name']); ?></p>
                            <p>University: <?php echo htmlspecialchars($course['uni_name']); ?></p>
                            <p>Fees: $<?php echo htmlspecialchars($course['fees']); ?></p>
                            <p>Level: <?php echo htmlspecialchars($course['level']); ?></p>
                            <button onclick="location.href='course_detail.php?course_id=<?php echo $course['course_id']; ?>'">View Course</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </nav>
    </div>
</div>

<!-- Footer -->
<div id="footer">
    <div class="footer_bottom_left">
        <h1>Coursera</h1>
        <h1>Community</h1>
        <h1>More</h1>
        <p>About</p>
        <p>Learners</p>
        <p>Press</p>
        <p>What We Offer</p>
        <p>Partners</p>
        <p>Investors</p>
        <p>Leadership</p>
        <p>Developers</p>
        <p>Terms</p>
        <p>Careers</p>
        <p>Privacy</p>
        <p>Catalog</p>
        <p>Translators</p>
        <p>Help</p>
    </div>
    <div class="f_clear"></div>
    <div class="footer_bottom_right">
        <img src="img/app Store.svg" alt="App store"><br>
        <img src="img/google Store.png" id="google_store" alt="Google store"><br>
    </div>
    <div class="f_clear"></div>
    <hr>
    <div class="footer_main">
        <div class="footer_main_left">
            <p>© 2024 Coursera Inc. All rights reserved.</p>
        </div>
        <div class="f_clear"></div>
        <div class="footer_main_right">
            <img src="img/Facebook-f_Logo-Black-Logo.wine.png" alt="FaceBook">
            <img src="img/LinkedIn-Icon-Black-Logo.wine.png" alt="LinkedIn">
            <img src="img/Twitter-Logo.wine.png" alt="Twitter">
            <img src="img/YouTube-Icon-Almost-Black-Logo.wine.png" alt="YouTube">
            <img src="img/Instagram-Glyph-Black-Logo.wine.png" alt="Instagram">
        </div>
        <div class="f_clear"></div>
    </div>
</div>

<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablink" and remove the class "active"
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the link that opened the tab
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Show the Home tab by default
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.tablink').click();
    });

</script>
<script>
        function loadEnrolledCourses() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_enrolled_courses.php', true);
            xhr.onload = function () {
                if (this.status === 200) {
                    var courses = JSON.parse(this.responseText);
                    var output = '';
                    if (courses.length > 0) {
                        for (var i in courses) {
                            output += '<div class="course">';
                            output += '<img src="' + courses[i].image + '" alt="' + courses[i].course_name + '">';
                            output += '<div>';
                            output += '<h3>' + courses[i].course_name + '</h3>';
                            output += '<p><strong>Duration:</strong> ' + courses[i].duration + ' weeks</p>';
                            output += '<p><strong>Level:</strong> ' + courses[i].level + '</p>';
                            output += '<p><strong>University:</strong> ' + courses[i].uni_name + '</p>';
                            output += '<p><strong>Enrollment Date:</strong> ' + courses[i].enrollment_date + '</p>';
                            output += '<button><a href="view.html" style="text-decoration: none;">Start Course</a> ' + '</button>';
                            output += '</div>';
                            output += '</div>';
                        }
                    } else {
                        output = '<p>You are not enrolled in any courses.</p>';
                    }
                    document.getElementById('enrolledCourses').innerHTML = output;
                }
            }
            xhr.send();
        }

        window.onload = loadEnrolledCourses;
    </script>
</body>
</html>