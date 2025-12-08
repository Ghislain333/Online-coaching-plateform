<?php
include("server/connection.php");
if (isset($_POST['register'])) {
    // Sanitize inputs
    $name = htmlentities($_POST['user_name']);
    $pass = htmlentities($_POST['password']);
    $email = htmlentities($_POST['email']);
    $country = htmlentities($_POST['country']);
    $gender = htmlentities($_POST['gender']);
    $account_type = htmlentities($_POST['account_type']);
    $dob = htmlentities($_POST['dob']);

    $rand = rand(1, 2);

    if ($name == '') {
        echo "<script> alert('We can not verify your name') </script>";
    }
    if (strlen($pass) < 8) {
        echo "<script> alert('password should be at least 8 characters') </script>";
        exit();
    }

    // Check if email exists
    $stmt = $con->prepare("SELECT COUNT(*) FROM users WHERE user_email = ?");
    $stmt->execute([$email]);
    $check = $stmt->fetchColumn();

    if ($check > 0) {
        echo "<script> alert('Email already exist, please try again!') </script>";
        echo "<script>window.open('register.php', '_self')</script>";
        exit();
    }

    // Set profile picture based on random number
    $profile_pic = ($rand == 1) ? "img/female-placeholder.jpg" : "img/male-placeholder.jpg";

    // Prepare and execute insert statement
    $stmt = $con->prepare("INSERT INTO users (user_name, user_pass, user_email, user_profile, user_country, user_gender, account_type, dob) 
                          VALUES (:name, :pass, :email, :profile, :country, :gender, :account_type, :dob)");

    try {
        $stmt->execute([
            ':name' => $name,
            ':pass' => $pass,
            ':email' => $email,
            ':profile' => $profile_pic,
            ':country' => $country,
            ':gender' => $gender,
            ':account_type' => $account_type,
            ':dob' => $dob
        ]);

        echo "<script> alert('Congratulations $name, your account has been successfully created') </script>";
        echo "<script> window.open('login.php', '_self') </script>";
    } catch (PDOException $e) {
        echo 'Error Message: ' . $e->getMessage() . "<br>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- style links -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/register.css">
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
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Singn up</a></li>
            </ul>
            <button id="open-menu-btn"><i class="fa fa-bars"></i></button>
            <button id="close-menu-btn"><i class="fa fa-close"></i></button>
        </div>
    </nav>

    <!-- ********** Registration Section ********** -->
    <section class="container registration__container">
        <div class="form__section">
            <h1>Register</h1>
            <p>Fill the form to create a Students Account</p>
            <form method="post" action="register.php" class="register__form">
                <div class="acc-type">
                    <select name="account_type" class="select_account">
                        <option disabled="" value="">Select Account Type</option>
                        <option class="acc-option" value="student">Student Account</option>
                        <option class="acc-option" value="coach">Coach Account</option>
                    </select>
                </div>
                <input type="text" name="user_name" placeholder="User Name">

                <label>Gender</label>
                <select class="" name="gender">
                    <option disabled="" value="">Select your Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>


                <select name="country" id="">
                    <option disabled="" value="">Select your Country</option>
                    <option value="cameroon">Cameroon</option>
                    <option value="tanzania">Tanzania</option>
                    <option value="south_africa">South Africa</option>
                    <option value="egypt">Egypt</option>
                    <option value="nigeria">Nigeria</option>
                    <option value="ghana">Ghana</option>
                    <option value="usa">USA</option>
                    <option value="uk">UK</option>
                </select>
                <label for="">Date Of Birth</label>
                <input type="date" name="dob" id="dob">
                <input type="email" name="email" placeholder="Email Address">
                <input type="password" name="password" placeholder="Create Password">
                <input type="submit" name="register" value="Register" class="btn btn-primary">
                <a href="login.html">Have an account already? Login.</a>
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