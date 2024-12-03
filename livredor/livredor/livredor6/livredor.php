<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Livre d'or</h1>

        <?php
        // Connexion à la base de données
        include 'admin/inc/connect.inc.php';

        // Traitement du formulaire (ajout de message)
        include 'admin/inc/inserer.inc.php';

        // Formulaire d'ajout de message
        include 'admin/inc/form.inc.php';

        // Affichage des messages
        include 'admin/inc/afficher.inc.php';

        // Déconnexion de la base de données
        include 'admin/inc/deconnect.inc.php';
        ?>
    </div>
</body>

</html>