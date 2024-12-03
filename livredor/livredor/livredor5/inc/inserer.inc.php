<?php
// Kiểm tra xem form đã được gửi hay chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $conn->real_escape_string($_POST['pseudo']);
    $texte = $conn->real_escape_string($_POST['texte']);

    // Chèn dữ liệu vào bảng
    $sql = "INSERT INTO commentaire (pseudo, texte) VALUES ('$pseudo', '$texte')";
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>Message ajouté avec succès!</p>";
    } else {
        echo "<p class='error'>Erreur: " . $conn->error . "</p>";
    }
}
