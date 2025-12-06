<?php
session_start();
include('config.inc.php');

// ---- Simple admin password ----
// Change this before giving to testers!
$ADMIN_PASSWORD = "test123";

// ---- Login handling ----
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

// ---- Connect to DB ----
@$db = new mysqli($GLOBALS['DB_HOST'], $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD'], $GLOBALS['DB_NAME']);

if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}

// ---- Approve comment ----
if (isset($_GET['approve'])) {
    $id = intval($_GET['approve']);
    $stmt = $db->prepare("UPDATE siteComments SET status='approved' WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: admin_comments.php");
    exit();
}

// ---- Fetch pending comments ----
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

<h2>Pending Comments</h2>

<?php if ($result->num_rows === 0): ?>
    <p>No pending comments.</p>
<?php else: ?>
<table>
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Comment</th>
    <th>Timestamp</th>
    <th>Action</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= htmlspecialchars($row['visitorName']) ?></td>
    <td><?= htmlspecialchars($row['email']) ?></td>
    <td><?= nl2br(htmlspecialchars($row['comment'])) ?></td>
    <td><?= htmlspecialchars($row['timestamp']) ?></td>
    <td>
        <a href="admin_comments.php?approve=<?= $row['id'] ?>">
            <button>Approve</button>
        </a>
    </td>
</tr>
<?php endwhile; ?>

</table>
<?php 
endif; 
include('footer.php');
?>