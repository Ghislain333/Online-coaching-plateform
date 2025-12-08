<?php
session_start();
include("server/connection.php");
$stmt = $con->prepare("SELECT * FROM course");
try {
    $stmt->execute();
    echo '<p>The query found ' . $stmt->rowCount() . ' rows;</p>';
} catch (PDOException $e) {
    echo 'Error Message: ' . $e->getMessage() . "<br>";
    exit();
}
while ($record = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<br>";
    echo '<h2>' . $record['CourseName'] . '</h2>';
    echo $record['youtubeId'];
    $url = 'https://www.youtube.com/watch?v=' . $record['youtubeId'];
    echo '<a href="' . $url . '">' . $url . '</a>';

    echo '
    <iframe 
        class="embadded-video"
        src="https://www.youtube.com/embed/' . $record['youtubeId'] . '?si=_TecctDuiMyfO_xd"
        title="YouTube video player" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen>
    </iframe>
    
    ';
}
?>