<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Livre d'or</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Admin - Livre d'or</h1>

        <?php
        // Connexion à la base de données
        include './inc/connect.inc.php';

        // Traitement de la suppression si un id est passé
        if (isset($_GET['id']) && !isset($_GET['action'])) {
            include './inc/supprimer.inc.php';
        }

        // Traitement de la modification (affichage du formulaire)
        if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
            $id = (int)$_GET['id'];

            $sql = "SELECT pseudo, texte FROM commentaire WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $pseudo = $row['pseudo'];
                $texte = $row['texte'];

                echo "<form action='admin.php?action=update&id=$id' method='post'>";
                echo "<label for='pseudo'>Pseudo :</label>";
                echo "<input type='text' id='pseudo' name='pseudo' value='" . htmlspecialchars($pseudo) . "' required>";
                echo "<label for='texte'>Message :</label>";
                echo "<textarea id='texte' name='texte' required>" . htmlspecialchars($texte) . "</textarea>";
                echo "<button type='submit'>Mettre à jour</button>";
                echo "</form>";
            } else {
                echo "<p class='error'>Message introuvable.</p>";
            }
        }

        // Traitement de la mise à jour
        elseif (isset($_GET['action']) && $_GET['action'] === 'update' && isset($_GET['id'])) {
            $id = (int)$_GET['id']; // Récupérer l'ID du message

            // Vérifier si le formulaire a été soumis
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $pseudo = $conn->real_escape_string($_POST['pseudo']);
                $texte = $conn->real_escape_string($_POST['texte']);

                // Mettre à jour le message dans la base de données
                $sql = "UPDATE commentaire SET pseudo = '$pseudo', texte = '$texte' WHERE id = $id";

                if ($conn->query($sql) === TRUE) {
                    echo "<p class='success'>Message mis à jour avec succès !</p>";

                    // Récupérer et afficher le message modifié
                    $sql = "SELECT id, pseudo, texte FROM commentaire WHERE id = $id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<div class='updated-message'>";
                        echo "<p><strong>ID:</strong> {$row['id']}</p>";
                        echo "<p><strong>Pseudo:</strong> {$row['pseudo']}</p>";
                        echo "<p><strong>Message:</strong> {$row['texte']}</p>";
                        echo "</div>";

                        // Ajouter le bouton "Retour"
                        echo "<a href='admin.php' class='nav-button'>Retour</a>";
                    } else {
                        echo "<p class='error'>Erreur : Impossible de récupérer le message mis à jour.</p>";
                    }
                } else {
                    echo "<p class='error'>Erreur lors de la mise à jour : " . $conn->error . "</p>";
                }
            }
        }

        // Affichage des messages (si aucune action n'est en cours)
        elseif (!isset($_GET['action']) || $_GET['action'] !== 'edit') {
            include './inc/afficher.inc.php';
        }

        // Déconnexion de la base de données
        include './inc/deconnect.inc.php';
        ?>
    </div>
</body>

</html>
