<?php
// Phân trang
$messages_per_page = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$start = ($page - 1) * $messages_per_page;

// Lấy dữ liệu từ bảng
$sql = "SELECT id, pseudo, texte FROM commentaire ORDER BY id DESC LIMIT $start, $messages_per_page";
$result = $conn->query($sql);

if (!$result) {
    die("Erreur SQL: " . $conn->error);
}

// Hiển thị tin nhắn
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='message'>";
        echo "<p><strong>ID:</strong> {$row['id']}</p>";
        echo "<p><strong>Pseudo:</strong> {$row['pseudo']}</p>";
        echo "<p><strong>Message:</strong> {$row['texte']}</p>";
        echo "</div>";
    }
} else {
    echo "<p>Pas de messages pour le moment.</p>";
}

// Tính tổng số trang
$total_sql = "SELECT COUNT(*) AS total FROM commentaire";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_messages = $total_row['total'];
$total_pages = ceil($total_messages / $messages_per_page);

// Hiển thị nút phân trang
echo "<div class='pagination'>";
if ($page > 1) {
    echo '<a href="livredor.php?page=' . ($page - 1) . '">Précédent</a>';
}
if ($page < $total_pages) {
    echo '<a href="livredor.php?page=' . ($page + 1) . '">Suivant</a>';
}
echo "</div>";
