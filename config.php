<?php
$host = "ram123.mysql.database.azure.com";
$username = "rkadmin";
$password = "rk@12345";
$dbname = "login";

$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, "ram123.mysql.database.azure.com", "rkadmin", "rk@12345", "login", 3306, MYSQLI_CLIENT_SSL);
// Create connection
// $conn = mysqli_init();

// Set SSL options
// mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem",NULL,NULL);

// Connect using SSL
//mysqli_real_connect($conn, $host, $username, $password, $dbname, 3306, NULL, MYSQLI_CLIENT_SSL);

// Check connection
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS users";
if ($conn->query($sql) === false) {
    die("Error creating database: " . $conn->error);
}

// Select the example_db database
$conn->select_db($dbname);

// Create table
$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)";
if ($conn->query($sql) === false) {
    die("Error creating table: " . $conn->error);
}


?>
