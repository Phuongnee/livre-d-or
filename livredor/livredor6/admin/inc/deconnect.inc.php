<?php
// Ngắt kết nối MySQL
if (isset($conn)) {
    $conn->close();
}
