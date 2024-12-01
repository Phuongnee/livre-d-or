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
        if (isset($_GET['id'])) {
            include './inc/supprimer.inc.php';
        }

        // Affichage des messages
        include './inc/afficher.inc.php';

        // Déconnexion de la base de données
        include './inc/deconnect.inc.php';
        ?>
    </div>
</body>

</html>