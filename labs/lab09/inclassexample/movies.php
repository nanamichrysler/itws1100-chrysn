<?php
// movies.php - debug-friendly version

// Show all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include config and functions if you want
include('includes/config.inc.php'); // make sure this has correct DB credentials
include('includes/functions.inc.php');

// Connect to the database
$db = new mysqli($GLOBALS['DB_HOST'], $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD'], $GLOBALS['DB_NAME']);

// Check connection
if ($db->connect_error) {
    die("<p>Database connection failed: " . $db->connect_error . "</p>");
}

// Optional: check what database we are connected to
echo "<p>Connected to database: " . $GLOBALS['DB_NAME'] . "</p>";

// Fetch movies
$query = "SELECT * FROM movies ORDER BY year";
$result = $db->query($query);

if (!$result) {
    die("<p>Query failed: " . $db->error . "</p>");
}

// Display movies
echo "<h1>Movies Table</h1>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Movie ID</th><th>Title</th><th>Year</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['movieid']) . "</td>";
        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['year']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No movies found in the table.</p>";
}

// Close connection
$db->close();
?>
