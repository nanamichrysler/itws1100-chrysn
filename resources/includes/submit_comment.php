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
    echo '<p><a href="index.php">Go Back</a></p>';
    exit();
}

// --- PREPARED STATEMENT INSERT ---
$query = "INSERT INTO siteComments (visitorName, email, comment, status)
          VALUES (?, ?, ?, 'pending')";

$stmt = $db->prepare($query);
$stmt->bind_param("sss", $name, $email, $comment);

if ($stmt->execute()) {
    echo "<h2>Thank you! Your comment has been submitted.</h2>";
    echo '<p><a href="index.php">Return to Home</a></p>';
} else {
    echo "<h2>Error inserting comment.</h2>";
    echo '<p><a href="index.php">Return to Home</a></p>';
}

$stmt->close();
$db->close();
?>