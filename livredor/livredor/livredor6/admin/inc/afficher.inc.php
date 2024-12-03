<?php
// Pagination
$messages_per_page = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$start = ($page - 1) * $messages_per_page;

// Récupération des données de la table
$sql = "SELECT id, pseudo, texte FROM commentaire ORDER BY id DESC LIMIT $start, $messages_per_page";
$result = $conn->query($sql);

// Affichage des messages
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='message'>";
        echo "<p><strong>ID:</strong> {$row['id']}</p>";
        echo "<p><strong>Pseudo:</strong> {$row['pseudo']}</p>";
        echo "<p><strong>Message:</strong> {$row['texte']}</p>";

        // Afficher les boutons uniquement si c'est admin.php
        if (basename($_SERVER['PHP_SELF']) == 'admin.php') {
            // Lien Supprimer
            echo "<p><a class='delete-link' href='admin.php?id={$row['id']}'>[Supprimer]</a></p>";

            // Lien Modifier
            echo "<p><a class='edit-link' href='admin.php?action=edit&id={$row['id']}'>[Modifier]</a></p>";
        }

        echo "</div>";
    }
} else {
    echo "<p>Pas de messages pour le moment.</p>";
}

// Calcul du nombre total de pages
$total_sql = "SELECT COUNT(*) AS total FROM commentaire";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_messages = $total_row['total'];
$total_pages = ceil($total_messages / $messages_per_page);

// Affichage des boutons de pagination
if ($total_pages > 1) {
    echo "<div class='pagination'>";
    
    $prev_page = $page - 1;
    $next_page = $page + 1;
    $prev_link = basename($_SERVER['PHP_SELF']) . "?page=$prev_page";
    $next_link = basename($_SERVER['PHP_SELF']) . "?page=$next_page";
    
    if ($page > 1) {
        echo "<a href='$prev_link'>Précédent</a>";
    } else {
        echo "<span class='disabled'>Précédent</span>";
    }
    
    if ($page < $total_pages) {
        echo "<a href='$next_link'>Suivant</a>";
    } else {
        echo "<span class='disabled'>Suivant</span>";
    }
    
    echo "</div>";
}

// Bouton de navigation entre admin et livredor
if (basename($_SERVER['PHP_SELF']) == 'admin.php') {
    echo "<a href='../livredor.php' class='nav-button'>Aller à Livre d'or</a>";
} else {
    echo "<a href='admin/admin.php' class='nav-button'>Aller à Admin</a>";
}
?>