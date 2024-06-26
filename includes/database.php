<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'dbMangaSun');
define('DB_USER', 'root');
define('DB_PASS', 'root');

try {
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}
?>
