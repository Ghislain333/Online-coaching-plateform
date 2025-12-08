<?php
session_start();
include("server/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>

    <!-- style links -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/classpage.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/assinment.css">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="container nav__container">
            <a href="/"><h4>SKILLMENTOR</h4></a>
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


<!-- ********** Class Section *********** -->

<section class="container assignments">
    <h3>Hello  User Name! you have been assigned to do the following <i class="fa fa-arrow-down"></i></h3>
    <div class="datagrid-view">
        <div class="ass-title">
            <h4>Clone The Webpage in the attached image</h4>
        </div>
        <div class="ass-description">
            <div class="text-description">
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex unde dolores iure culpa est placeat a at odio iusto enim, libero omnis cumque dolore itaque perspiciatis tenetur voluptas nisi in.
                </p>
            </div>
            <div class="img-description"><img src="img/task-description.webp" alt=""></div>
            <h4>you are expected to submit this project on the <span>22/07/2025</span></h4>
            <p>
                When you are done with the project, upload it to github and send a link to the repository to your coach
            </p>
        </div>
    </div>
</section>


<!-- ********** End of Class Section *********** -->








    <script src="main.js"></script>
  <!-- Initialize Swiper -->

</body>
</html>