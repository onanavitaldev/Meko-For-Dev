<?php

    // Déconnexion de la séssion

    session_start(); // Démarrage / Initialisation de la séssion
    session_destroy(); // Destruction de la séssion
    header("location:sign-in.php"); // On redirige l'utilisateur vers la page de connexion
?>