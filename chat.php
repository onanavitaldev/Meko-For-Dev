<?php
    //démarer la session
    session_start();
    if (!isset($_SESSION['user'])) {
        // si l'utilisateur n'est pas connecté
        // redirection vers la page de connexion
        header("location:sign-in.php");
    }
    $user = $_SESSION['user'] // recupération de l'email de l'utilisateur
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
    <title>En ligne</title>
</head>

<body style="overflow:hidden;">
    <!-- Sidebar: Outils -->
    <?php include("src/components/sidebar.php") ?>

    <!-- Barre de navigation -->

    <!-- Chat Box -->
    <div class="chat mt-10">
        <!-- <div class="button-email">
            <span class="flex font-bold text-white">
                <img src="assets/icons/account.png" height="22" width="22">
                <?= $user ?>
            </span>
            <a href="log-out.php" class="Deconnexion_btn">Déconnexion</a>
        </div> -->
        <!-- messages -->
        <div class="messages_box p-10 sm:p-20 text-white">
            Récupération des méssages ...
        </div>
        <!-- Fin messages -->

        <?php
        //envoi des messages
        if (isset($_POST['send'])) {
            // recuperons le message
            $message = $_POST['message'];
            //connexion à la base de donnée
            include("config/config_tchat.php");
            //verifions si le champs n'est pas vide
            if (isset($message) && $message != "") {
                //inserer le message dans la base de données
                $req = mysqli_query($con, "INSERT INTO messages VALUES (NULL ,'$user','$message',NOW())");
                //on actualise la page
                header('location:chat.php');
            } else {
                // si le message est vide , on actualise la page
                header('location:chat.php');
            }
        }
        ?>
        <form action="" class="send_message flex fixed justify-center w-full p-5 sm:p-32 sm:ml-32 mt-10" method="POST">
            <div class="relative block md:block w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none" style="margin-left:1045px;">
                    <button type="submit" name="send" style="cursor:pointer;">
                        <img src="assets/icons/message.png" height="22" width="22">
                    </button>
                </div>
                <input type="text" name="message" id="search-navbar" class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-800 focus:ring-black" placeholder="Envoyez un méssage..." style="width:1100px;background-color:var(--main-bg)">
            </div>
        </form>
    </div>

    <script>
        // On actualise automatiquement la méssagerie en utilisant la technologie AJAX
        var message_box = document.querySelector('.messages_box');
        setInterval(function() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    message_box.innerHTML = this.responseText;
                }
            };

            // récupération de la page messagerie
            xhttp.open("GET", "message.php", true);

            // Actualiser le chat tous les 500 millisecondes
            xhttp.send()
        }, 500)
    </script>
</body>

</html>