<?php
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Xóa tin nhắn dựa trên id
    $sql = "DELETE FROM commentaire WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>Message supprimé avec succès !</p>";
    } else {
        echo "<p class='error'>Erreur lors de la suppression: " . $conn->error . "</p>";
    }
}
