 <?php
 
session_start();
include("server/connection.php");

// Vérification de la connexion utilisateur
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}

// Validation de l'offer_id
$offer_id = filter_input(INPUT_GET, 'offer_id', FILTER_VALIDATE_INT);
if (!$offer_id) {
    $_SESSION['error'] = "ID d'offre invalide";
    header('Location: courses.php');
    exit;
}

try {
    // Récupération des infos utilisateur
    $stmt = $con->prepare("SELECT user_name FROM users WHERE user_email = :user_email");
    $stmt->bindParam(':user_email', $_SESSION['user_email'], PDO::PARAM_STR);
    $stmt->execute();
    $user_row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user_row) {
        throw new Exception("Utilisateur non trouvé");
    }
    
    $user_name = $user_row['user_name'];

    // Récupération de l'offre avec vérification plus robuste
    $stmt = $con->prepare("SELECT * FROM StudentOffers WHERE offer_id = :offer_id LIMIT 1");
    $stmt->bindParam(':offer_id', $offer_id, PDO::PARAM_INT);
    
    if (!$stmt->execute()) {
        throw new Exception("Erreur lors de la récupération de l'offre");
    }
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$row) {
        $_SESSION['error'] = "L'offre demandée n'existe pas ou a été supprimée";
        header('Location: courses.php');
        exit;
    }

    // Assignation des valeurs avec vérification
    $offer_video = $row['video'] ?? '';
    $offer_name = $row['course_name'] ?? 'Cours inconnu';
    $offer_lang = $row['langName'] ?? '';
    $offer_description = $row['course_description'] ?? '';
    $offer_notes = $row['notes'] ?? '';
    $offer_level = $row['user_level'] ?? 0;

} catch (PDOException $e) {
    $_SESSION['error'] = "Erreur de base de données: " . $e->getMessage();
    header('Location: courses.php');
    exit;
} catch (Exception $e) {
    $_SESSION['error'] = $e->getMessage();
    header('Location: courses.php');
    exit;
}
?>
/* session_start();
include("server/connection.php");
if (isset($_SESSION['user_email'])) {
    $offer_id = $_GET['offer_id'] ?? null; // Ajout de l'opérateur null coalescent pour éviter les notices
    $user = $_SESSION['user_email'];
    $stmt = $con->prepare("SELECT * FROM users WHERE user_email=:user_email");
    $stmt->bindParam(':user_email', $user, PDO::PARAM_STR);
    $stmt->execute();
    $user_row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_name = $user_row['user_name'] ?? 'Utilisateur'; // Valeur par défaut

    $stmt = $con->prepare("SELECT * FROM StudentOffers WHERE offer_id=:offer_id");
    $stmt->bindParam(':offer_id', $offer_id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'offre existe
    if (!$row) {
        die("L'offre demandée n'existe pas ou a été supprimée.");
    }

    // Maintenant on peut accéder aux éléments en toute sécurité
    $offer_video = $row['video'] ?? '';
    $offer_name = $row['course_name'] ?? 'Cours inconnu';
    $offer_lang = $row['langName'] ?? '';
    $offer_description = $row['course_description'] ?? '';
    $offer_notes = $row['notes'] ?? '';
    $offer_level = $row['user_level'] ?? 0;
}
?>*/
/* session_start();
include("server/connection.php");
if (isset($_SESSION['user_email'])) {
    $offer_id = $_GET['offer_id'];
    $user = $_SESSION['user_email'];
    $stmt = $con->prepare("SELECT * FROM users WHERE user_email=:user_email");
    $stmt->bindParam(':user_email', $user, PDO::PARAM_STR);
    $stmt->execute();
    $user_row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_name = $user_row['user_name'];

    $stmt = $con->prepare("SELECT * FROM StudentOffers WHERE offer_id=:offer_id");
    $stmt->bindParam(':offer_id', $offer_id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $offer_video = $row['video'];
    $offer_name = $row['course_name'];
    $offer_lang = $row['langName'];
    $offer_description = $row['course_description'];
    $offer_notes = $row['notes'];
    $offer_level = $row['user_level'];

} */
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education website</title>

    <!-- style links -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/classpage.css">
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


    <!-- ********** Class Section *********** -->

    <section class="container class__container">
        <h1>Level <?php echo $offer_level ?></h1>
        <div class="class__lessons">
            <div class="lesson">
                <div class="class__greetings">
                    <h3>Welcome to class <span><?php echo $user_name ?></span></h3>
                    <p>Hope you are excited to excited to start learning!!!</p>
                </div>
                <h3 class="level"><?php echo $offer_name ?><i id="icon" class="fa fa-laptop"></i></h3>
                <p>
                    <?php echo $offer_notes ?> <i id="icon" class="fa fa-terminal"></i>
                </p>
            </div>

            <div class="class__video">
                <h4>Learn <?php echo $offer_lang ?> <i id="icon" class="fa fa-arrow-down"></i></h4>
                <br>
                <iframe class="embadded-video"
                    src="https://www.youtube.com/embed/<?php echo $offer_video ?>?si=_TecctDuiMyfO_xd"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                </iframe>
            </div>

            <div class="up-next">
                <h3>What's Next <i id="icon" class="fa fa-step-forward"></i></h3>
                <p>
                    After completing the video above, you can then proceed to take the Test
                    and go to the next level.
                </p>
                <a href="test.html"><button class="btn btn-primary">Take A Test</button></a>
            </div>
        </div>

    </section>


    <!-- ********** End of Class Section *********** -->








    <script src="main.js"></script>
    <!-- Initialize Swiper -->

</body>

</html>