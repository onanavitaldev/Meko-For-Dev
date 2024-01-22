<!-- Inclure le script de configuration de la base de donnée -->
<?php include("config/config_task.php") ?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <!-- Meta données(Mots clés, description, robots...) -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Chemin d'accès menant vers les fichiers scss -->
    <?php require("src/components/link.php"); ?>

    <!-- Titre -->
    <title>Mon compte</title>
</head>

<body>
    <!-- Sidebar: Outils -->
    <?php include("src/components/sidebar.php") ?>


    <!-- Footer: Informations complémentaires -->
    <?php include("src/components/footer.php") ?>

    <!-- Script: Chemins d'accès vers les fichiers JavaScript -->
    <?php include("src/components/script.php") ?>
</body>

</html>