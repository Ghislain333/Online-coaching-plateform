<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- style links -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
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
                <li><a href="index.html">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="contact.">Contact</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="register.php">Singn up</a></li>
            </ul>
            <button id="open-menu-btn"><i class="fa fa-bars"></i></button>
            <button id="close-menu-btn"><i class="fa fa-close"></i></button>
        </div>
    </nav>
    <!-- ********** Login Section********** -->
    <section class="container login__container">
        <div class="form__section">
            <h1>Login</h1>
            <p>Login if you have an account Account</p>
            <form method="post" class="login__form">
                <input type="email" name="email" id="" placeholder="Email Address" required>
                <input type="password" name="pass" id="user-password" placeholder="Enter Password">
                <div class="forgot-passowrd">
                    <a href="/">
                        <p>Forgot Password</p>
                    </a>
                </div>
                <button type="submit" name="sign_in" class="btn btn-primary">Login</button>
                <a href="register.php">Don't have an account? Register here.</a>
                <?php include("server/signin_user.php") ?>
            </form>
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
    <!-- Initialize Swiper -->

</body>

</html>