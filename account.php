<!DOCTYPE html>
<?php
session_start();
include("server/connection.php");

if (isset($_SESSION['user_email'])) {
    $user = $_SESSION['user_email'];
    $stmt = $con->prepare("SELECT * FROM users WHERE user_email=:user");
    $stmt->bindParam(':user', $user);
    $stmt->execute();
    $row = $stmt->fetch();
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
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </ul>
            <button id="open-menu-btn"><i class="fa fa-bars"></i></button>
            <button id="close-menu-btn"><i class="fa fa-close"></i></button>
        </div>
    </nav>
    <!-- ******* Account page ******* -->
    <section class="account">
        <!-- Account top navigation section -->
        <div class="top__account-container">
            <div class="top-navigation">
                <div class="profile__photo-name">
                    <img src="<?php echo $user_profile; ?>" alt="">
                    <span><?php echo $user_name; ?></span>
                </div>

                <div class="account__right-actions">
                    <button class="btn btn-primary">Logout</button>
                    <?php
                    echo '
                    <a href="Chats/signin.php"><i class="fa fa-envelope"></i></a>
                    ';
                    ?>
                </div>
            </div>
        </div>

        <!-- Level and Courses information -->
        <div class="courses_section">
            <h2>All your courses for</h2>
            <div class="add-course-btn"><a href="courses.php"><button class="btn" for="">Add New course 
                <div class="fa fa-plus"></i></button></a></div>
            <div class="container courses_level-information">


                <?php
                // $find_user = "select * from users";
                // $run_user = mysqli_query($con, $find_user);
                // $rowid = mysqli_fetch_array($run_user);
                // $userId = $rowid['user_id'];
                $stmt = $con->prepare("SELECT * FROM StudentOffers WHERE user_id=:user_id");
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    $offer_id = $row['offer_id'];
                    $offer_image = $row['cover_image'];
                    $offer_name = $row['langName'];
                    $offer_description = $row['course_description'];

                    echo '
                <div class="single-course">
                    <div class="course-image">
                    <img src="img/'. $offer_image . '" alt="">
                    </div>
                    <div class="course-description">
                        <h2>' . $offer_name . '</h2>
                        <span>50% Completed</span>
                        <p>
                            ' . $offer_description . '
                        </p>
                    </div>
                    <form action="classpage.php" offer_id=' . $offer_id . '" method="post"> 
                      <button type="submit" name="learn" class="btn btn-primary">Continue</button>
                    </form>
                    </div>
                ';
                }
                ?>
            </div>

            <?php
            if ($account_type == 'Student') {
                echo '
                    <div style="margin-top: 1.4rem; display: flex; flex-direction: column; justify-content: center; align-items: center;" class="">
                        <h2>Click bellow to check new Assignments</h2>
                        <div class="actions">
                        <form action="assignments.php" method="post">
                            <button type="submit" class="btn btn-primary">Check for new assignments</button>
                        </form>
                        <form action="selectcoach.php" method="post">
                            <button type="submit" class="btn">Choose Coach</button>
                        </form>
                        </div>
                    </div>
                    ';
            } else if ($account_type == 'Coach') {
                echo '
                    <div style="margin-top: 1.4rem; display: flex; flex-direction: column; justify-content: center; align-items: center;" class="acc-acction">
                       <h2>Manage Your Mentees Here <i class="fa fa-arrow-down"></i> </h2>
                       <form action="coachaction.php" method="post">
                        <button type="submit" class="btn btn-primary">Take action</button>
                       </form>
                    </div>
                    ';
            }
            ?>
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
                    <li><a href="about.php">About</a></li>
                    <li><a href="courses.php">Courses</a></li>
                    <li><a href="contact.php">Contact</a></li>
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
            <small>Copyright  Ghislain Fokou</small>
        </div>
    </footer>
    <!-- ********** End of footer *********** -->



    <script src="main.js"></script>
</body>

</html>