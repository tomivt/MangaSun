<?php

const DB_HOST = 'localhost';
const DB_NAME = 'dbMangaSun';
const DB_USER = 'root';
const DB_PASS = 'root';

try {
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}