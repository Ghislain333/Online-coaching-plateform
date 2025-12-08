<?php
include("server/connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education website</title>

    <!-- style links -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <style>
        .courses {
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class="container nav__container">
            <a href="/">
                <h4>SKILLMENTOR</h4>
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
    <!-- header section -->


    <!-- ****** Popular courses ******* -->

    <section class="courses">
        <h2>Our popular courses</h2>
        <div class="container courses__container">
            <?php
            $stmt = $con->prepare("SELECT * FROM course");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $courseId = $row['CourseId'];
                $courseimage = $row['CoverPhoto'];
                $Lang = $row['LangName'];
                $Description = $row['CourseDescription'];
                $CourseName = $row['CourseName'];
                echo '
                    <article class="course">
                    <div class="course__image">
                        <img src="img/' . $courseimage . '"  alt="image here">
                    </div>
                    <div class="course__info">
                        <h4>' . $CourseName . '</h4>
                    <p>
                       ' . $Description . '
                    </p>
                    <a href="singleCourses.php?courseId=' . $courseId . '" class="btn btn-primary">Learn More</a>
                    </div>
                  </article>
            ';
            }

            ?>

             <article class="course">
            <div class="course__image">
                <img src="img/portfolio-3.jpg" alt="">
            </div>
            <div class="course__info">
                <h4>Data Structures and algorithms</h4>
            <p>
                Master the building blocks of efficient software. 
                Learn arrays, linked lists, sorting algorithms,
                 and problem-solving techniques to ace technical interviews.


            </p>
            <a href="singleCourses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

        <article class="course">
            <div class="course__image">
                <img src="img/portfolio-5.jpg" alt="">
            </div>
            <div class="course__info">
                <h4>Web Development</h4>
            <p>
             Build modern, responsive websites and web apps. 
             Cover HTML/CSS, JavaScript frameworks (React, Angular), 
             and server-side tech (Node.js, Django).

            </p>
            <a href="singleCourses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

        <article class="course">
            <div class="course__image">
                <img src="img/portfolio-5.jpg" alt="">
            </div>
            <div class="course__info">
                <h4>Mobile App Development</h4>
            <p>
                Create iOS (Swift) and Android (Kotlin/Flutter) apps. 
                Dive into UI/UX principles and cross-platform development.
            </p>
            <a href="singleCourses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

        <article class="course">
            <div class="course__image">
                <img src="img/portfolio-5.jpg" alt="">
            </div>
            <div class="course__info">
                <h4>Cloud Computing & DevOps</h4>
            <p>
               Deploy scalable applications using AWS, Docker, and Kubernetes. 
               Automate workflows with CI/CD pipelines.
            </p>
            <a href="singleCourses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

        <article class="course">
            <div class="course__image">
                <img src="img/portfolio-5.jpg" alt="">
            </div>
            <div class="course__info">
                <h4>Cybersecurity & Ethical Hacking</h4>
            <p>
                Protect systems from threats. 
                Learn penetration testing, cryptography, and security best practices.
            </p>
            <a href="singleCourses.html" class="btn btn-primary">Learn More</a>
            </div>
        </article>

        <article class="course">
            <div class="course__image">
                <img src="img/portfolio-5.jpg" alt="">
            </div>
            <div class="course__info">
                <h4>Artificial Intelligence & Machine Learning</h4>
            <p>
                Train models, analyze data, and build AI solutions with Python, TensorFlow, and PyTorch.

Key Topics:

Neural networks

NLP (Natural Language Processing)

Computer vision
            </p>
            <a href="singleCourses.html" class="btn btn-primary">Learn More</a>

            </div>
        </article>

        <article class="course">
            <div class="course__image">
                <img src="img/portfolio-5.jpg" alt="">
            </div>
            <div class="course__info">
                <h4>Blockchain & Web3 Development</h4>
            <p>
                Explore decentralized apps (DApps), smart contracts (Solidity), and blockchain fundamentals.
            </p>
            <a href="singleCourses.html" class="btn btn-primary">Learn More</a>

            </div>
        </article>

        <article class="course">
            <div class="course__image">
                <img src="img/portfolio-5.jpg" alt="">
            </div>
            <div class="course__info">
                <h4>Game Development</h4>
            <p>
                LDesign and code interactive 2D/3D games.
                ngines: Unity (C#), Unreal Engine (Blueprints/C++).

Physics, animation, multiplayer networking.
Project: Publish a game on Steam/itch.io.
Ideal For: Creative coders, indie game studios.
            </p>
            <a href="singleCourses.html" class="btn btn-primary">Learn More</a>

            </div>
        </article>

        <article class="course">
            <div class="course__image">
                <img src="img/portfolio-5.jpg" alt="">
            </div>
            <div class="course__info">
                <h4>Data Structures and algorithms</h4>
            <p>
                Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Quibusdam vitae veniam nostrumlol
                velit suscipit quis ab reprehenderit dolore odi.
            </p>
            <a href="singleCourses.html" class="btn btn-primary">Learn More</a>

            </div>
        </article> 
        </div>
    </section>
    <!-- ****** End of courses ******* -->






    <!-- ****** Footer Section ******* -->

    <footer class="footer">
        <div class="container footer__container">
            <div class="footer__1">
                <a href="/" class="footer__logo">
                    <h4>SKILLMENTOR</h4>
                </a>
                <p>
                    Find your focus. Learn what matters to you.
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
                    <p>+237 699 73 35 87</p>
                    <p>ghislainfk@gmail.com</p>
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
            <small>Copyright Ghislain Fokou</small>
        </div>
    </footer>
    <!-- ********** End of footer *********** -->



    <script src="main.js"></script>
</body>

</html>