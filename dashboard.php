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
    <title>@<?= $row['pseudo'] ?> - Meko</title>
</head>

<body>
    <!-- Sidebar: Outils -->
    <?php include("src/components/sidebar.php") ?>

    <!-- Sidebar: Outils -->
    <?php include("src/components/menu.php") ?>

    <!-- Contenu: Ajout, mise à jour et suppréssion d'une activité -->
    <div class="p-12 pt-1" id="content_dashboard">
        <!-- #### -->
        <section class="bg-gray-50 pb-20" id="features">
            <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
                <div class="max-w-screen-md mb-8 lg:mb-16">
                    <h2 class="mb-4 text-2xl sm:text-6xl font-extrabold text-white" style="line-height:1.2;">
                        <b>
                            Bienvenue à vous, 
                            <span style="color:var(--red);">
                                <?= $row['pseudo'] ?>
                            </span>
                        </b>
                    </h2>
                    <p class="text-gray-400 sm:text-xl">
                        Communiquer éfficacement et en toute sécurité avec vos collaborateurs.
                    </p>
                </div>
                <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                    <div class="p-5 shadow-lg hover:shadow-sm rounded-lg">
                        <h3 class="mb-2 text-xl font-bold text-white">
                            Méssagerie instantanée
                        </h3>
                        <p class="text-gray-400">
                            Communiquez textuellement avec vos collègues en toute sécurité et en temps réel à travers une interface de conversation flexible et épurée. 
                        </p>
                    </div>
                    <div class="p-5 shadow-lg hover:shadow-sm rounded-lg">
                        <h3 class="mb-2 text-xl font-bold text-white">
                            Service de Webmail
                        </h3>
                        <p class="text-gray-400">
                            Vous avez la possibilité d'envoyer des mails depuis l'interface de Meko sans vous connectez à votre méssagerie electronique 
                        </p>
                    </div>
                    <div class="p-5 shadow-lg hover:shadow-sm rounded-lg">
                        <h3 class="mb-2 text-xl font-bold text-white">
                            Envoi d'SMS / MMS
                        </h3>
                        <p class="text-gray-400">
                            Envoyer facilement des SMS à n'importe quel contact téléphonique sans faire appel à votre téléphone portable.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gray-50 pb-20" id="explain_video_saas">
            <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
                <div class="max-w-screen-md mb-8 lg:mb-16">
                    <h2 class="mb-4 text-2xl sm:text-6xl font-extrabold text-white" style="line-height:1.2;">
                        <b>C'est quoi Meko ?</b>
                    </h2>
                </div>
                <div class="block">
                    <div class="flex flex-wrap justify-around mr-56">
                        <video controls height="500" width="1000" style="border-radius: 10px;">
                            <source src="saas.mp4">
                        </video>
                    </div>
                </div>
            </div>
        </section>
        <!-- Menu -->
        <button class="shadow-lg" id="message_btn" title="Plus d'outils">
            <a href="#">
                <img src="assets/icons/menu.png">
            </a>
        </button>
    </div>

    <!-- Footer: Informations complémentaires -->
    <?php include("src/components/footer.php") ?>

    <!-- Script: Chemins d'accès vers les fichiers JavaScript -->
    <?php include("src/components/script.php") ?>
    <script>
        let dateContent = document.getElementById("date_day").innerHTML = new Date();
    </script>
</body>

</html>

<?php
                }
            }
        }
    }
?>