<?php
    include('includes/init.inc.php'); 
  include('includes/config.inc.php'); 
  include('includes/functions.inc.php'); 
?>

<title>Movie & Actor Relations</title>

<?php include('includes/head.inc.php'); ?>

<h2>Movies and Their Actors</h2>

<?php include('includes/menubody.inc.php'); ?>

<?php
@$db = new mysqli($GLOBALS['DB_HOST'], $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD'],$GLOBALS['DB_NAME']);

if ($db->connect_error) {
   echo '<div class="messages">Could not connect to the database. Error: ';
   echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
} else {
   $dbOk = true;
}

$havePost = isset($_POST["save"]);

$currentMovie = "";
$first = true;

while ($row = $result->fetch_assoc()) {

    $movieTitle = htmlspecialchars($row['title']);
    $movieYear = htmlspecialchars($row['year']);
    $actorName = htmlspecialchars($row['first_names'] . ' ' . $row['last_name']);

    if ($movieTitle !== $currentMovie) {
        if (!$first) {
            echo "</ul>";
        }
        echo "<h3>$movieTitle ($movieYear)</h3>";
        echo "<ul>";
        $currentMovie = $movieTitle;
        $first = false;
    }

    if ($row['first_names'] === null) {
        echo "<li><em>No actors assigned</em></li>";
    } else {
        echo "<li>$actorName</li>";
    }
}

if (!$first) {
    echo "</ul>";
}

include('includes/foot.inc.php');
?>
