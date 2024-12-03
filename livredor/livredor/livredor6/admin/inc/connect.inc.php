<?php
// Kết nối MySQL
$conn = new mysqli("localhost", "root", "root", "livredor", 8889);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("<p class='error'>Connection failed: " . $conn->connect_error . "</p>");
}
