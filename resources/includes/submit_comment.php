<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../mySite.css"> 
    <!-- Adjust path depending on your folder structure -->
</head>
<body>
    <div class="banner">
        <a href=index.php><h1>Nanami Chrysler</h1></a>
        <div class="nav-links">
            <a href="../../index.php" class="button cta">Home</a> <!--from .hero .cta class-->
            <a href="./aboutMe/aboutme.html" class="button cta">About Me</a>
            <a href="./labs/labs.html" class="button cta">Labs</a>
            <a href="./groupProjects/groupProject.html" class="button cta">Group Projects</a>
            <a href="./contactMe/contactme.html" class="button cta">Contact Me</a>
        </div>
    </div>

<?php
include('config.inc.php'); // adjust the path if necessary

@$db = new mysqli($GLOBALS['DB_HOST'], $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD'], $GLOBALS['DB_NAME']);

if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}

// --- SERVER-SIDE VALIDATION ---
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$comment = trim($_POST['comment']);

$errors = [];

// Required fields
if (empty($name)) $errors[] = "Name is required.";
if (empty($email)) $errors[] = "Email is required.";
if (empty($comment)) $errors[] = "Comment is required.";

// Email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

if (!empty($errors)) {
    echo "<h3>Error submitting comment:</h3>";
    foreach ($errors as $e) {
        echo "<p>$e</p>";
    }
    echo '<p><a href="../../index.php">Go Back</a></p>';
    exit();
}

// --- PREPARED STATEMENT INSERT ---
$query = "INSERT INTO siteComments (visitorName, email, comment, status)
          VALUES (?, ?, ?, 'pending')";

$stmt = $db->prepare($query);
$stmt->bind_param("sss", $name, $email, $comment);

if ($stmt->execute()) {
    echo '<div class="commentAccepted">';
    echo "<h4>Thank you! Your comment has been submitted.</h2><br>";
    echo '<a href="../../index.php" class="button cta">Return to Home</a>';
    echo '</div>';
} else {
    echo "<h2>Error inserting comment.</h2>";
    echo '<a href="../../index.php">Return to Home</a>';
}

$stmt->close();
$db->close();

include('footer.php');
?>

    <div class="contact-icons">
    <a href="mailto:nanami.jc73@gmail.com">
        <img src="../images/gmail icon.png" alt="Gmail" class="img-gmail">
        nanami.jc73@gmail.com
    </a>
    <a href="tel:+15302194452">
        <img src="../images/phone logo.png" alt="Phone" class="img-gmail">
        (530)-219-4452
    </a>
    <a href="https://www.linkedin.com/in/nanami-chrysler" target="_blank">
        <img src="../images/linkedin icon.webp" alt="LinkedIn" class="img-linkedIn">
        www.linkedin.com/in/nanami-chrysler
    </a>
    </div>

<?php include('footer.php') ?>