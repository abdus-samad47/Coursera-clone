<?php
session_start();
include 'db.php';

// Check if the course_id is provided
if (isset($_GET['course_id'])) {
    $course_id = intval($_GET['course_id']);

    // Fetch course details
    $stmt = $conn->prepare("SELECT courses.*, universities.uni_name, course_category.category_name FROM courses 
                            JOIN universities ON courses.uni_id = universities.uni_id
                            JOIN course_category ON courses.category_id = course_category.category_id
                            WHERE course_id = ?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $course = $result->fetch_assoc();

    if (!$course) {
        echo "Course not found.";
        exit();
    }

    $stmt->close();
} else {
    echo "No course selected.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($course['course_name']); ?></title>
    <link rel="stylesheet" type="text/css" href="enrollCourse.css">
    <link rel="icon" href="https://d3njjcbhbojbot.cloudfront.net/web/images/favicons/favicon-v2-96x96.png" sizes="96x96">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="mypagesfooter.css">
    <link rel="stylesheet" href="navBarStyle.css">
</head>
<body>
<!--Nav bar-->
<header>
    <div class="nav-bar" style>
        <div class="left">
            <div>
                <img class="nav" id="logo" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE2LjIuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPgo8c3ZnIHZpZXdCb3g9IjAgMCAxMTU1IDE2NCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLW1pdGVybGltaXQ9IjIiPjxwYXRoIGQ9Ik0xNTkuNzUgODEuNTRjMC00NC40OSAzNi42My04MC40NyA4Mi40My04MC40NyA0Ni4xMiAwIDgyLjc2IDM2IDgyLjc2IDgwLjQ3IDAgNDQuMTYtMzYuNjQgODAuOC04Mi43NiA4MC44LTQ1LjggMC04Mi40My0zNi42OC04Mi40My04MC44em0xMjUuNjEgMGMwLTIyLjI0LTE5LjMtNDEuODctNDMuMTgtNDEuODctMjMuNTUgMC00Mi44NSAxOS42My00Mi44NSA0MS44NyAwIDIyLjU3IDE5LjMgNDIuMiA0Mi44NSA0Mi4yIDIzLjkyIDAgNDMuMTgtMTkuNjMgNDMuMTgtNDIuMnptNzA1LjYzIDEuMzFjMC00OC43NCAzOS41OC04MS43OCA3NS41Ny04MS43OCAyNC41MyAwIDM4LjYgNy41MiA0OC4wOCAyMS45MmwzLjc3LTE5aDM2Ljc5djE1NS40aC0zNi43OWwtNC43NS0xNmMtMTAuNzkgMTEuNzgtMjQuMjEgMTktNDcuMSAxOS0zNS4zMy0uMDUtNzUuNTctMzEuMTMtNzUuNTctNzkuNTR6bTEyNS42MS0uMzNjLS4wOS0yMy41MjctMTkuNDctNDIuODM1LTQzLTQyLjgzNS0yMy41OSAwLTQzIDE5LjQxMS00MyA0M3YuMTY1YzAgMjEuNTkgMTkuMyA0MC44OSA0Mi44NiA0MC44OSAyMy44NSAwIDQzLjE0LTE5LjMgNDMuMTQtNDEuMjJ6TTk0NS43OCAyMlY0aC00MC4yM3YxNTUuMzloNDAuMjNWNzUuNjZjMC0yNS4xOSAxMi40NC0zOC4yNyAzNC0zOC4yNyAxLjQzIDAgMi43OS4xIDQuMTIuMjNMOTkxLjM2LjExYy0yMC45Ny4xMS0zNi4xNyA3LjMtNDUuNTggMjEuODl6bS00MDQuMjcuMDF2LTE4bC00MC4yMy4wOS4zNCAxNTUuMzcgNDAuMjMtLjA5LS4yMi04My43MmMtLjA2LTI1LjE4IDEyLjM1LTM4LjI5IDMzLjkzLTM4LjM0IDEuMzc2LjAwNCAyLjc1Mi4wODEgNC4xMi4yM0w1ODcuMSAwYy0yMSAuMTctMzYuMjIgNy4zOS00NS41OSAyMi4wMXpNMzM4Ljg4IDk5LjJWNC4wMWg0MC4yMlY5NC4zYzAgMTkuOTUgMTEuMTIgMzEuNzMgMzAuNDIgMzEuNzMgMjEuNTkgMCAzNC0xMy4wOSAzNC0zOC4yOFY0LjAxaDQwLjI0djE1NS4zOGgtNDAuMjF2LTE4Yy05LjQ4IDE0LjcyLTI0Ljg2IDIxLjkyLTQ2LjEyIDIxLjkyLTM1Ljk4LjAxLTU4LjU1LTI2LjE2LTU4LjU1LTY0LjExem0zOTEuNzQtMTcuNDhjLjA5LTQzLjUxIDMxLjIzLTgwLjc0IDgwLjYyLTgwLjY1IDQ1LjguMDkgNzguMTEgMzYuNzggNzggODAgLjAxIDQuMjczLS4zMyA4LjU0LTEgMTIuNzZsLTExOC40MS0uMjJjNC41NCAxOC42NSAxOS44OSAzMi4wOSA0My4xMiAzMi4xNCAxNC4wNiAwIDI5LjEyLTUuMTggMzguMy0xNi45NGwyNy40NCAyMmMtMTQuMTEgMTkuOTMtMzkgMzEuNjYtNjUuNDggMzEuNjEtNDYuNzUtLjE2LTgyLjY3LTM1LjIzLTgyLjU5LTgwLjd6bTExOC4xMi0xNi4xNGMtMi4yNi0xNS43LTE4LjU5LTI3Ljg0LTM3Ljg5LTI3Ljg3LTE4LjY1IDAtMzMuNzEgMTEuMDYtMzkuNjMgMjcuNzNsNzcuNTIuMTR6bS0yNjEuNCA1OS45NGwzNS43Ni0xOC43MmM1LjkxIDEyLjgxIDE3LjczIDIwLjM2IDM0LjQ4IDIwLjM2IDE1LjQzIDAgMjEuMzQtNC45MiAyMS4zNC0xMS44MiAwLTI1LTg0LjcxLTkuODUtODQuNzEtNjcgMC0zMS41MiAyNy41OC00OC4yNiA2MS43Mi00OC4yNiAyNS45NCAwIDQ4LjkyIDExLjQ5IDYxLjQgMzIuODNsLTM1LjQ0IDE4Ljc1Yy01LjI1LTEwLjUxLTE1LjEtMTYuNDItMjcuNTgtMTYuNDItMTIuMTQgMC0xOC4wNiA0LjI3LTE4LjA2IDExLjQ5IDAgMjQuMyA4NC43MSA4Ljg3IDg0LjcxIDY3IDAgMzAuMjEtMjQuNjIgNDguNTktNjQuMzUgNDguNTktMzMuODItLjAzLTU3LjQ2LTExLjE5LTY5LjI3LTM2Ljh6TTAgODEuNTRDMCAzNi43MyAzNi42My43NCA4Mi40My43NGMyNy45NDctLjE5NiA1NC4xODIgMTMuNzM3IDY5LjY3IDM3bC0zNC4zNCAxOS45MmE0Mi45NzIgNDIuOTcyIDAgMDAtMzUuMzMtMTguMzJjLTIzLjU1IDAtNDIuODUgMTkuNjMtNDIuODUgNDIuMiAwIDIyLjU3IDE5LjMgNDIuMiA0Mi44NSA0Mi4yYTQyLjUwMiA0Mi41MDIgMCAwMDM2LjMxLTIwbDM0IDIwLjI4Yy0xNS4zMDcgMjMuOTU1LTQxLjkwMiAzOC40MzEtNzAuMzMgMzguMjhDMzYuNjMgMTYyLjM0IDAgMTI1LjY2IDAgODEuNTR6IiBmaWxsPSIjMDA1NkQyIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48L3N2Zz4=" alt="logo">

            </div>

            <div id="exp_nav">

                <span>Explore <img  class="icon" src="img/down-chevron.png" alt="Down Arrow"></span>
                
            </div>

            <div id="search">
                <!-- <span>What do you want to learn ?</span> -->
                <input type="text" id="search_input" placeholder="Machine Learning">
                <!-- <div> -->
                    <!-- <img src="img/search.png"  class="search_icon" alt=""> -->
                <!-- </div> -->

            </div>

            <div id="icon_search">
                    <img src="img/search.png" class="search_icon" alt="">

            </div>
         
        </div>
        <div class="f_clear"></div>
       
        <div class="f_clear"></div>
        
        
    </div>
</header>
    <!--header -->
    <div class="header">
        <div class="header-wrap">

        
        <div class="left-part">
            <div class="go-to-origin">
                <ul>
                <p>Category: <?php echo htmlspecialchars($course['category_name']); ?></p>
                </ul>
            </div>

            <div class="title">
            <h1><?php echo htmlspecialchars($course['course_name']); ?></h1>
            </div>

            <div class="star-cont">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                
                <span class="no-of-review"> <b>4.9(162,658)</b> ratings</span>
                 
            </div>

            <div class="enrollment-wrap">
            <button class="enroll" onclick="location.href='payment.php?course_id=<?php echo $course_id; ?>'">Proceed to Payment</button>

                
            </div>

            <div>
                <p> <span><b>4,338,084</b></span> already Enrolled</p>
            </div>
        </div>

        <div class="rigth-part">
            <p>Offered By</p>
            <strong><p> <?php echo htmlspecialchars($course['uni_name']); ?></p></strong>
        </div>
    </div>
    </div>
    <!-- Course nav-bar-->
    <div class="course-nav" >
        <div class="tabs-con">
            <div><a href="#abt"><span class="tab">About</span></a></div>
            <div><a href="#"><span class="tab">Syllabus</span></a></div>
            <div><a href="#"><span class="tab">Review</span></a></div>
            <div><a href="#"><span class="tab">FAQ</span></a></div>
        </div>
        <hr>
    </div>

<!--Content for course nav-bar -->
<div class="info">
    <div class="course-info">

        <div class="info-title">
            <h1 id="abt">About the Course</h1>
            <p>6,663,971 recent view</p>
        </div>

       <div class="info-cont">
       <p><?php echo nl2br(htmlspecialchars($course['description'])); ?></p> 
       </div>

        <div class="skills-tag">
            <div class="tg">
               <span class="tag-title">SKILLS YOU WILL GAIN</span> 
            </div>
            <div class="tags">
                <div ><p>Logistics Regression</p></div>
                <div><p>Artificial Neural Network</p></div>
                <div><p>Machine Learning (ML) Algorithms</p></div>
                <div><p>Machine Learning</p></div>
            </div>
        </div>

    </div>

    <div class="crs-prop">
        <div>
            <div class="prop-icon-con"><i class="fa fa-calendar"></i></div>
            <div class="prop-info-">
                <div class="prop-name">Flexible deadlines</div>
                <div class="prop-des">Reset deadlines in accordance to your schedule.</div>
            </div>
        </div>
        <div>
            <div class="prop-icon-con"><i class="fa fa-certificate"></i></div>
            <div class="prop-info-">
                <div class="prop-name">Shareable Certificate</div>
                <div class="prop-des">Earn a Certificate upon completion</div>
            </div>
        </div>
        <div>
            <div class="prop-icon-con"><i class="fa fa-globe"></i></div>
            <div class="prop-info-">
                <div class="prop-name">100% online</div>
                <div class="prop-des">Start instantly and learn at your own schedule.</div>
            </div>
        </div>
        <div>
            <div class="prop-icon-con"><i class="fa fa-clock-o"></i></div>
            <div class="prop-info-">
                <div class="prop-name"><p>Duration: <?php echo htmlspecialchars($course['duration']); ?> weeks</p></div>
            </div>
        </div>
        <div>
            <div >
                <span class="prop-icon-con"> <i class="fa fa-commenting-o"></i></span></div>
            <div class="prop-info-">
                <div class="prop-name">English</div>
                <div class="prop-des">Subtitles: Arabic, French, Portuguese (European), Chinese (Simplified), Italian, Vietnamese, German, Russian, English, Hebrew, Spanish, Hindi, Japanese</div>
            </div>
            
        </div>
       
    </div>
</div>


    <!--footer -->
    <footer>
        <div class="footer-cont">
            <div class="ft-uper-box">
                <div class="ft-left">
                    
                
                
                </div>
               
                <div class="ft-right">
                    <div class="apple-store ">
                        <a href="#"><img src="https://d3njjcbhbojbot.cloudfront.net/web/images/icons/download_on_the_app_store_badge_en.svg" class="dwl"></a>
                    </div>
                    <div class="play-store ">
                        <a href=""><img src="https://d3njjcbhbojbot.cloudfront.net/web/images/icons/en_generic_rgb_wo_45.png" class="dwl"></a>
                    </div>
                    <div class="cert">
                        <a href="#"><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://d3njjcbhbojbot.cloudfront.net/web/images/icons/2018-B-Corp-Logo-Black-S.png?auto=format%2Ccompress&dpr=1&w=151&h=120&q=40" > </a></div>
                </div>
            </div>
            <hr>

            <div class="lower-box">
                <div class="bf-l">
                    <span>&copy; 2024 Coursera Inc. All rights reserved.</span>
                </div>
                <div class="bf-r">
                    <div>
                        <span><a><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://s3.amazonaws.com/coursera_assets/footer/facebook.png?auto=format%2Ccompress&dpr=1&w=28&h=28&q=40"></a></span>
                        <span> <a><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://s3.amazonaws.com/coursera_assets/footer/linkedin.png?auto=format%2Ccompress&dpr=1&w=28&h=28&q=40"></a></span>
                        <span><a><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://s3.amazonaws.com/coursera_assets/footer/twitter.png?auto=format%2Ccompress&dpr=1&w=28&h=28&q=40"></a></span>
                        <span><a><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://s3.amazonaws.com/coursera_assets/footer/youtube.png?auto=format%2Ccompress&dpr=1&w=28&h=28&q=40"></a></span>
                        <span><a><img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://s3.amazonaws.com/coursera_assets/footer/instagram.png?auto=format%2Ccompress&dpr=1&w=28&h=28&q=40"></a></span>
                       
                    </div>
                </div>
                <div class="clear-f"></div>
            </div>

        </div>
    </footer>
    
</body>
</html>
