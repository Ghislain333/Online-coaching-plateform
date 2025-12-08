<!DOCTYPE html>
<?php
session_start();
include("server/connection.php");
if (isset($_SESSION['user_email'])) {
    $user = $_SESSION['user_email'];
    $stmt = $con->prepare("SELECT * FROM users WHERE user_email=:user");
    $stmt->bindParam(':user', $user);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_email = $row['user_email'];
    $user_profile = $row['user_profile'];
    $account_type = $row['account_type'];
} else {
    header("location:login.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education website</title>

    <!-- style links -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="alert.js"></script>
    <style>

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
                <ul class="nav__menu">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="courses.php">Courses</a></li>
                    <li><a href="contact.">Contact</a></li>
                </ul>
            </ul>
            <button id="open-menu-btn"><i class="fa fa-bars"></i></button>
            <button id="close-menu-btn"><i class="fa fa-close"></i></button>
        </div>
    </nav>
    <!-- ******* Coach Actions Page ******* -->
    <section class="">
        <div class="courses_section">
            <h2>Select your Personal Coach</h2>
            <div class="container courses_level-information">
                <?php
                $stmt = $con->prepare("SELECT * FROM users WHERE account_type = :account_type");
                $coach_type = 'Coach';
                $stmt->bindParam(':account_type', $coach_type);
                $stmt->execute();
                while ($row2 = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $student_name = $row2['user_name'];
                    $student_image = $row2['user_profile'];
                    $student_domain = $row2['user_domain'];
                    $student_level = $row2['levels'];
                    $student_id = $row['user_id'];
                    echo '
                <div class="single-course">
                    <div class="course-image">
                    <img src="' . $student_image . '" alt="">
                    </div>
                    <div class="course-description">
                    <h1>
                        <h2>' . $student_name . '</h2>
                        <span>50% Completed</span>
                        <p>
                            Level ' . $student_level . ' of ' . $student_domain . ';
                        </p>
                    </div>
                    <form action="account.php?user_name=' . $student_name . '" method="post"> 
                      <button onlick="Update()" name="updcoach" type="submit" name="learn" class="btn btn-primary">Choose ' . $student_name . ' as your Coach</button>
                    </form>
                    </div>
                ';
                }
                ?>

            </div>
        </div>
    </section>




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
                    <p>ghislainfk8@gmail.com</p>
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



    <script src="main.js"></script>
</body>

</html>