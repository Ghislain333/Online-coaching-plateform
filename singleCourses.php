<?php
include("server/connection.php");
session_start();
$user = $_SESSION['user_email'];
$courseId = $_GET['courseId'];
$stmt = $con->prepare("SELECT * FROM course WHERE courseId=:courseId");
$stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$course_name = $row['CourseName'];
$cover_image = $row['CoverPhoto'];
$intro_notes = $row['notes'];
$description = $row['CourseDescription'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education website</title>

    <!-- style links -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/singlecourses.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class="container nav__container">
            <a href="/">
                <h4>CoachIE</h4>
            </a>
            <ul class="nav__menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="contact.">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Singn up</a></li>
            </ul>
            <button id="open-menu-btn"><i class="fa fa-bars"></i></button>
            <button id="close-menu-btn"><i class="fa fa-close"></i></button>
        </div>
    </nav>
    <!-- ************ Single courses section *********** -->
    <div class="container singleCourses__section">
        <div class="course__img">
            <img src="img/<?php echo $cover_image; ?>" alt="">
        </div>
        <h1 class="course__title"><?php echo $course_name; ?><i class="fa fa-laptop"></i></h1>
        <p>
            <?php echo $description; ?>
        </p>
        <div class="course__partitions">
            <article class="partition">
                <h4 class="course__parts"><i class="fa fa-arrow-right"></i> Introduction to Web Development</h4>
                <p>
                    <?php echo $intro_notes; ?>
                </p>
            </article>
            <!-- hidden form -->
            <form action="server/takecourse.php?courseId=<?php echo $courseId; ?>" method="post">
                <!-- <input type="hidden" name="" value="">
            <input type="hidden" name="" value="">
            <input type="hidden" name="" value="">
            <input type="hidden" name="" value="">
            <input type="hidden" name="" value="">
            <input type="hidden" name="" value="">
            <input type="hidden" name="" value="">
            <input type="hidden" name="" value="">
            <input type="hidden" name="" value=""> -->
                <button class="btn btn-primary" type="submit" name="newcourse">Start Learning</button>
            </form>

        </div>
    </div>










    <!-- ****** Footer Section ******* -->

    <footer class="footer">
        <div class="container footer__container">
            <div class="footer__1">
                <a href="/" class="footer__logo">
                    <h4>CoachIE</h4>
                </a>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>

            <div class="footer__2">
                <h4>Quick Links</h4>
                <ul class="permalinks">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="courses.html">Courses</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>

            <div class="footer__3">
                <h4>Privacy</h4>
                <ul class="privacy">
                    <li><a href="/">Privacy Policy</a></li>
                    <li><a href="/">Terms And Conditions</a></li>
                    <li><a href="/">Refund Policy</a></li>
                </ul>
            </div>

            <div class="footer__4">
                <h4>Contact Us</h4>
                <div>
                    <p>+237 676 51 44 28</p>
                    <p>ivordev8@gmail.com</p>
                </div>

                <ul class="footer__socials">
                    <li>
                        <a href="/"><i class="fa fa-facebook"></i></a>
                        <a href="/"><i class="fa fa-instagram"></i></a>
                        <a href="/"><i class="fa fa-twitter"></i></a>
                        <a href="/"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer__copyright">
            <small>Copyright &copy; IvorIev8</small>
        </div>
    </footer>
    <!-- ********** End of footer *********** -->



    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // when window width is above 600px
            breakpoints: {
                600: {
                    slidesPerView: 2,
                }
            }
        });
    </script>
</body>

</html>