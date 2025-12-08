<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education website</title>

    <!-- style links -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/classpage.css">
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
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
                <li><a href="contact.">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Singn up</a></li>
            </ul>
            <button id="open-menu-btn"><i class="fa fa-bars"></i></button>
            <button id="close-menu-btn"><i class="fa fa-close"></i></button>
        </div>
    </nav>


<!-- ********** Test Section *********** -->

<section class="class__container">
    <div class="container">
        <h2>Now lets see if you have truly understood the previouse lesson <i id="icon" class="fa fa-book"></i></h2>
        <div class="excercise__section">
            <h3>Task Description <i id="icon" class="fa fa-pencil"></i></h3>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui, eum animi commodi cupiditate magni,
                 repudiandae enim nostrum hic incidunt adipisci aperiam asperiores saepe rem, repellendus optio dolorem vitae! Nisi, repellat.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod quae, consequuntur,
                 eius et aut sunt exercitationem unde voluptatibus libero iure provident temporibus minus corporis sed enim quibusdam eum maxime doloribus!
            </p>
        </div>
    </div>

    <div class="code-editor">
         <h4>Write your HTML code in the Dark space bellow, and the output of your code will preview on the white region bellow.</h4>
            <form action="Chats/signin.php">
                <div class="task__code-editor">
                    <div class="left">
                        <label for="html">HTML <i id="icon" class="fa fa-html5"></i></label>
                        <textarea id="html-code" onkeyup="run()"></textarea>
                    </div>
                    <div class="right">
                        <label for=""> OUTPUT <i id="icon" class="fa fa-play"></i></label>
                        <iframe id="output"></iframe>
                        <!-- <input type="submit" value="Submit Excercise" class="btn btn-primary"> -->
                    </div>
                 </div>  
                <input type="submit" class="btn btn-primary" value="Contact Coach">
            </form>
    </div>        
    
</section>
    <!-- ****** Footer Section ******* -->

    <footer class="footer">
        <div class="container footer__container">
    <div class="footer__1">
        <a href="/" class="footer__logo"><h4>SKILLMENTOR</h4></a>
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
            <p>+237 699 73 35 87</p>
            <p>ghsilainfk@gmail.com</p>
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
            <small>Copyright Ghislain fokou</small>
       </div>
    </footer>
    <!-- ********** End of footer *********** -->

<!-- ********** End of Test Section *********** -->








    <script src="main.js"></script>
  <!-- run function for code editor -->
  <script>
    function run(){
        let htmlCode = document.getElementById("html-code").value;
        let output = document.getElementById("output");
        output.contentDocument.body.innerHTML = htmlCode;
        }
  </script>
</body>
</html>