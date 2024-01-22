<!-- Inclure le script de configuration de la base de donnée -->
<!-- Inclure le script de configuration de la base de donnée -->
<?php 
    session_start();
    include("config/config_tchat.php");
    if (isset($_SESSION['user'])) { 
        // si l'utilisateur s'est connecté
        //connexion à la abse de donnée
        include "config/config_tchat.php";

        //requete pour afficher les messages
        $req = mysqli_query($con, "SELECT * FROM utilisateurs ORDER BY id_u DESC");
        if (mysqli_num_rows($req) == 0) { 
            // S'il n'y a pas encore de message
            echo "Votre messagerie est vide";
        } else {
            //si oui
            while ($row = mysqli_fetch_assoc($req)) {
                //si c'est vous qui avvez envoyé le mesage on utilise ce format :
                if ($row['email'] == $_SESSION['user']) {
?>
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
<?php
    if (isset($_SESSION['user'])) { 
        // si l'utilisateur s'est connecté
        //connexion à la abse de donnée
        include "config/config_tchat.php";

        //requete pour afficher les messages
        $req = mysqli_query($con, "SELECT * FROM utilisateurs ORDER BY id_u DESC");
        if (mysqli_num_rows($req) == 0) { 
            // S'il n'y a pas encore de message
            echo "Votre messagerie est vide";
        } else {
            //si oui
            while ($row = mysqli_fetch_assoc($req)) {
                //si c'est vous qui avvez envoyé le mesage on utilise ce format :
                if ($row['email'] == $_SESSION['user']) {
    ?>
    <!-- Sidebar: Outils -->
    <?php include("src/components/sidebar.php") ?>

    <div class="p-12 pt-1" id="content_dashboard">
        <!-- #### -->
        <section class="bg-gray-50 pb-20" id="features">
            <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
                <div class="max-w-screen-md mb-8 lg:mb-16">
                    <h2 class="mb-4 text-2xl sm:text-6xl font-extrabold text-white" style="line-height:1.2;">
                        <b>Mon compte</b>
                    </h2>
                    <p class="text-gray-400 sm:text-xl">
                        Salut à vous, <span style="color:var(--red);">
                        <?= $row['pseudo'] ?>
                    </span>
                    </p>
                </div>
                <div class="w-full">
                    <div class="block space-y-6" id="infos_account">
                        <div class="w-full shaow-lg" id="items">
                            <p class="flex flex-wrap justify-between w-full p-20" id="content">
                                <span>Nom</span>
                                <span style="color:var(--red);">Meko/@<?= $row['pseudo'] ?></span>
                            </p>
                        </div>
                        <div class="w-full shaow-lg" id="items">
                            <p class="flex flex-wrap justify-between w-full p-20" id="content">
                                <span>Email</span>
                                <span style="color:var(--red);">
                                    <?= $row['email'] ?>
                                </span>
                            </p>
                        </div>
                        <div class="w-full shaow-lg" id="items">
                            <p class="flex flex-wrap justify-between w-full p-20" id="content">
                                <span>Poste</span>
                                <span style="color:var(--red);">
                                    <?= $row['work'] ?>
                                </span>
                            </p>
                        </div>
                        <div class="w-full shaow-lg" id="items">
                            <p class="flex flex-wrap justify-between w-full p-20" id="content">
                                <span>Mot de passe</span>
                                <span style="color:var(--red);">
                                    ******
                                </span>
                            </p>
                        </div>
                        <div class="w-full shaow-lg" id="items">
                            <p class="flex flex-wrap justify-between w-full p-20" id="content">
                                <span>Adrèsse IP</span>
                                <span style="color:var(--red);">
                                    <?php echo $_SERVER["REMOTE_ADDR"]; ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php
                    }
                }
            }
        }

    ?>

    <!-- Footer: Informations complémentaires -->
    <?php include("src/components/footer.php") ?>

    <!-- Script: Chemins d'accès vers les fichiers JavaScript -->
    <?php include("src/components/script.php") ?>
    <?php
                }
            }
        }
    }
?>
</body>

</html>