<?php
//database configuration; sets up database connection parameters based on the environment

//localhost development settings (reused from lab09)
    if ($_SERVER["HTTP_HOST"] == 'localhost' || $_SERVER["HTTP_HOST"] == 'localhost:8080') {
    $GLOBALS['HOSTNAME'] = 'localhost';
    $GLOBALS['DB_NAME']  = 'mySite';
    $GLOBALS['DB_HOST']  = 'localhost';
    $GLOBALS['DB_USERNAME'] = 'root';
    $GLOBALS['DB_PASSWORD'] = 'root';
    } else {
    //production/Azure server settings (reused from lab09)
    $GLOBALS['HOSTNAME'] = 'localhost';
    $GLOBALS['DB_NAME']  = 'mySite';
    $GLOBALS['DB_HOST']  = 'localhost';
    $GLOBALS['DB_USERNAME'] = 'phpmyadmin';
    $GLOBALS['DB_PASSWORD'] = 'phpitws2025!'; 
    }
?>
