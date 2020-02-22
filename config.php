<?php $link = new mysqli("localhost", "root", "", "highlandcap");
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
    alert("Database error");
}
?>