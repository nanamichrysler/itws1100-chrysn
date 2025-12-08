<?php
session_start(); //starts a php session to store log-in info
include('config.inc.php');

//admin password => only people that know the password can test the comments system
$ADMIN_PASSWORD = "test123";

//admin is not logged in, check if password was enterd (right = logged in, wrong = log in again)
if (!isset($_SESSION['admin_logged_in'])) {
    if (isset($_POST['password']) && $_POST['password'] === $ADMIN_PASSWORD) {
        $_SESSION['admin_logged_in'] = true;
    } else {
        echo '<form method="POST">
                <h2>Admin Login</h2>
                <input type="password" name="password" placeholder="Enter admin password">
                <button type="submit">Login</button>
              </form>';
        exit();
    }
}

//connect to the mySite database
@$db = new mysqli($GLOBALS['DB_HOST'], $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD'], $GLOBALS['DB_NAME']);

if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}

//approve comment
if (isset($_GET['approve'])) {
    $id = intval($_GET['approve']); //contains the id of the commentID to approve
    $stmt = $db->prepare("UPDATE siteComments SET status='approved' WHERE id=?"); //set the comment with the ID to status=approved
    $stmt->bind_param("i", $id); //fills in the id number into the '?' spot in prepared statement
    $stmt->execute(); //runs the prepared statement
    header("Location: admin_comments.php"); //redirects admin back to the page
    exit(); //makes sure nothing else runs after the redirection
}

//get pending comments
$query = "SELECT id, visitorName, email, comment, timestamp 
          FROM siteComments 
          WHERE status='pending'
          ORDER BY timestamp DESC";

$result = $db->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Comment Moderation</title>
    <link rel="stylesheet" href="../mySite.css">
</head>
<body>
    <br>
    <h2>Pending Comments</h2>
    <!--there are no pending comments currently-->
    <?php if ($result->num_rows === 0): ?>
        <p>No pending comments.</p>
    <?php else: ?> <!--if there are comments, show comment-->
    <table>
        <tr>
            <th>Name</th> <!--th = table header-->
            <th>Email</th>
            <th>Comment</th>
            <th>Timestamp</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?> <!--get all of the pending comments-->
        <tr>
            <td><?= htmlspecialchars($row['visitorName']) ?></td> <!--?= is shorthand for ?php echo-->
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['comment'])) ?></td> <!--nl2br changes \n to <br>-->
            <td><?= htmlspecialchars($row['timestamp']) ?></td>
            <td>
                <a href="admin_comments.php?approve=<?= $row['id'] ?>">
                    <button>Approve</button> <!--when clicked on, triggers approve comment php code from earlier-->
                </a>
            </td>
        </tr>
    </table>
    <?php 
    endif; 
    include('footer.php');
    ?>