<?php
    session_start();
    if (isset($_SESSION['user'])) { 
        // si l'utilisateur s'est connecté
        //connexion à la abse de donnée
        include "config/config_tchat.php";

        //requete pour afficher les messages
        $req = mysqli_query($con, "SELECT * FROM messages ORDER BY id_m DESC");
        if (mysqli_num_rows($req) == 0) { 
            // S'il n'y a pas encore de message
            echo 
            "
                <h2 class='mb-4 text-1xl sm:text-2xl text-center text-white' style='line-height:1.2;'>Aucun méssage pour l'instant</h2>
            <b>
            ";
        } else {
            //si oui
            while ($row = mysqli_fetch_assoc($req)) {
                //si c'est vous qui avvez envoyé le mesage on utilise ce format :
                if ($row['email'] == $_SESSION['user']) {
    ?>
                    <div class="message your_message p-2 ml-0 sm:ml-10">
                        <span style="color:#fff;">Vous</span>
                        <p class="text-white pt-2 pb-2"><?= $row['msg'] ?></p>
                        <p class="date">Envoyer le <?= $row['date'] ?></p>
                    </div>
                <?php
                } else {
                    //si vous n'êtes pas l'auteur du message , on affiche ce message sur ce format :
                ?>
                    <div class="message others_message p-2">
                        <span><?= $row['email'] ?></span>
                        <p class="text-white pt-2 pb-2"><?= $row['msg'] ?> </p>
                        <p class="date">Reçu le <?= $row['date'] ?></p>
                    </div>
    <?php
                }
            }
        }
    }

?>