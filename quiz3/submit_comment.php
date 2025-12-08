<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../resources/mySite.css"> 
</head>
<body>
    <div class="banner">
        <a href=home.php><h1>Nanami Chrysler</h1></a>
        <div class="nav-links">
            <a href="../home.php" class="button cta">Home</a> 
            <a href="../aboutMe/aboutme.html" class="button cta">About Me</a>
            <a href="../labs/labs.html" class="button cta">Labs</a>
            <a href="../groupProjects/groupProject.html" class="button cta">Group Projects</a>
            <a href="../contactMe/contactme.html" class="button cta">Contact Me</a>
        </div>
    </div>
    <div>
        <?php
        include('includes/config.inc.php'); 

        @$db = new mysqli($GLOBALS['DB_HOST'], $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD'], $GLOBALS['DB_NAME']);

        if ($db->connect_error) {
            die("Database connection failed: " . $db->connect_error);
        }

        //get values
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $comment = trim($_POST['comment']);

        $errors = [];

        //make sure that each field is completed
        if (empty($name)) $errors[] = "Name is required.";
        if (empty($email)) $errors[] = "Email is required.";
        if (empty($comment)) $errors[] = "Comment is required.";

        //verifies email format; use php's built-in filter system
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        //if there are any errors in submitting a comment, show the error and return to home page
        if (!empty($errors)) {
            echo "<h3>Error submitting comment:</h3>";
            foreach ($errors as $e) {
                echo "<p>$e</p>";
            }
            echo '<p><a href="../home.php">Go Back</a></p>';
            return;
        }

        //prepared statementto add comment
        $query = "INSERT INTO siteComments (visitorName, email, comment, status)
                VALUES (?, ?, ?, 'pending')";

        $stmt = $db->prepare($query);
        $stmt->bind_param("sss", $name, $email, $comment);

        //display message showing that the submission was successful and redirect to home page
        if ($stmt->execute()) {
            echo '<div class="commentAccepted">';
            echo "<h4>Thank you! <br> Your comment has been submitted.</h4><br>";
            echo '<a href="../../home.php" class="button cta">Return to Home</a>';
            echo '</div>';
        } else {
            echo "<h2>Error inserting comment.</h2>";
            echo '<a href="../../home.php">Return to Home</a>';
        }
        $stmt->close();
        $db->close();
        ?>
    </div> 
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
<?php include('includes/footer.php');?>