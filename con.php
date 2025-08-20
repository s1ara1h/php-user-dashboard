<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "info"; // اسم قاعدة البيانات الصحيح

// Create connection مع تحديد اسم قاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to database: " . $dbname;
?>