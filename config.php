<?php $conn = new mysqli("localhost", "root", "", "highlandcapital");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    alert("Database error");
}
?>