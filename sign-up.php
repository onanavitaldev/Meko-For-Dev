<!-- Inclure le script de configuration de la base de donnée -->
<?php include("config/config_task.php") ?>
<?php 
    //démarer la session
    session_start();
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <!-- Meta données(Mots clés, description, robots...) -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Chemin d'aaccès menant vers les fichiers scss -->
    <?php include("src/components/link.php"); ?>

    <!-- Titre -->
    <title>Créer un compte</title>
</head>
<body class="flex justify-around pt-20">
    <?php
        if(isset($_POST['button_inscription'])){
           //si le formulaire est envoyé
           //se connecter à la base de donnée
           include "config/config_tchat.php";
           //extraire les infos du formulaire
           extract($_POST);
           //verifions si les champs sont vides
           if(isset($pseudo) && isset($work) && isset($email) && isset($mdp1) && $email != "" && $mdp1 != "" && isset($mdp2) && $mdp2 != "" && $pseudo != "" && $work != ""){
               //verifions que les mots de passes sont conforme
               if($mdp2 != $mdp1){
                   // s'ils sont differrent
                   $error = "Les Mots de passes sont différents !";
               }else {
                   //si non , verifions si l'email existe
                   $req = mysqli_query($con , "SELECT * FROM utilisateurs WHERE email = '$email'");
                   if(mysqli_num_rows($req) == 0){
                    //si ça n'existe pas , créons le compte*
                    // On hash le mot de passe avec Bcrypt, via un coût de 12
                    // $cost = ['cost' => 12];
                    // $mdp1 = password_hash($mdp1, PASSWORD_BCRYPT, $cost);
                       $req = mysqli_query($con , "INSERT INTO utilisateurs VALUES (NULL, '$pseudo', '$work' ,'$email' , '$mdp1') ");
                       if($req){
                           // si le compte a été créer , créons une variable pour afficher un message dans la page de
                           //connexion
                           $_SESSION['message'] = "<p class='message_inscription'>Votre compte a été créer avec succès !</p>" ;
                           //redirection vers la page de connexion
                           header("Location:sign-in.php") ;
                      
                       }else {
                           //si non
                           $error = "Inscription Echouée !";
                       }
                   }else {
                       //si ça existe
                       $error = "Cet Email existe déjà !";
                   }

               }
           }else {
               $error = "Veuillez remplir tous les champs !" ;
           }
        }
    ?>
    <form action="" method="POST" class="form_connexion_inscription" >
        <h1 class="font-bold text-3xl text-white text-center pt-6">Inscrivez-vous</h1>
        <p class="text-center text-1xl text-gray-500 mb-6">
            Créer votre compte Meko et monter en productivité
        </p>
        <p class="message_error"></p>
        <input type="text" class="mb-4" name="pseudo" placeholder="Nom d'utilisateur">
        <input type="text" class="mb-4" name="work" placeholder="Votre proféssion">
        <input type="email" class="mb-4" name="email" placeholder="Votre adrèsse email">
        <input type="password" name="mdp1" placeholder="Votre mot de passe" class="mdp1 mb-4">
        <input type="password" name="mdp2" placeholder="Confirmer le mot de passe" class="mdp2">
        <input type="submit" value="Je m'inscris" class="btn shadow-lg" name="button_inscription">
        <p class="link text-white">
            Vous avez un compte ? <br>
            <a href="sign-in.php">Se connecter</a>
        </p>
    </form>

    <!-- Footer: Informations complémentaires -->
    <?php include("src/components/footer.php") ?>

    <!-- Script: Chemins d'accès vers les fichiers JavaScript -->
    <?php include("src/components/script.php") ?>
</body>
</html>