<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = new mysqli('localhost', 'root', 'root', 'iit'); // match your config

if ($db->connect_error) {
    die('Connect Error: ' . $db->connect_error);
}

$result = $db->query('SELECT * FROM movies');
if ($result) {
    while ($row = $result->fetch_assoc()) {
        print_r($row);
    }
} else {
    echo 'Query failed: ' . $db->error;
}
?>
