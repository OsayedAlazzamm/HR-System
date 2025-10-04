<?php
$host = "localhost";
$name = "root";
$pass = "";
$dbname = "hr_system";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $name, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
