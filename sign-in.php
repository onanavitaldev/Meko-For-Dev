<!-- Inclure le script de configuration de la base de donnée -->
<?php include("config/config_task.php") ?>
<?php 
  //  Démarer la session
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
    <title>Se connecter</title>
</head>
<body class="flex justify-around pt-40">
    <?php 
       if(isset($_POST['login'])){
           // si le formulaire est envoyé
           // se connecter à la base de donnée
           include "config/config_tchat.php";
           // extraire les infos du formulaire
           extract($_POST);
           // verifions si les champs sont vides
           if(isset($email) && isset($mdp1) && $email != "" && $mdp1 != ""){
               // verifions si les identifiants sont justes
               $req = mysqli_query($con , "SELECT * FROM utilisateurs WHERE email = '$email' AND mdp = '$mdp1'");
               if(mysqli_num_rows($req) > 0){
                   // si les identifiants sont justes
                   // Création d'une session qui contient l'email
                   $_SESSION['user'] = $email ;
                   // redirection vers la page de Chat/Conversation
                   header("location:load.php");
                   // Detruire la variable du message d'inscription
                   unset($_SESSION['message']);
               }else {
                   // si non
                   $error = "Email ou Mots de passe incorrecte(s) !";
               }
           }else {
               // si les champs sont vides
               $error = "Veuillez remplir tous les champs !" ;
           }
       }
    ?>
    <!-- Formulaire de connexion -->
    <form action="" method="POST" class="form_connexion_inscription">
        <h1 class="font-bold text-center text-white text-3xl pt-10">Connexion</h1>
        <p class="text-1xl text-center text-gray-500 mb-6">
            Identifiez-vous et connectez-vous à des outils de productivité
        </p>
        <br>
        <?php
           // affichons le message qui dit qu'un compte a été créer
           if(isset($_SESSION['message'])){
               echo $_SESSION['message'] ;
           }
        ?>
        <p class="message_error">
            <?php 
               // affichons l'erreur
               if(isset($error)){
                   echo $error ;
               }
            ?>
        </p>
        <input type="email" placeholder="Votre adrèsse email" name="email" class="mb-4">
        <input type="password" placeholder="Votre mot de passe" name="mdp1">
        <input type="submit" class="shadow-lg btn" value="Se connecter" name="login" style="background-color:var(--red);">
        <p class="link text-white">Vous n'avez pas de compte ?  <br>
            <a href="sign-up.php" class="underline">Créer un compte</a>
        </p>
        <br>
    </form>
    <!-- ### -->

    <!-- Footer: Informations complémentaires -->
    <!-- <?php include("src/components/footer.php") ?> -->

    <!-- Script: Chemins d'accès vers les fichiers JavaScript -->
    <?php include("src/components/script.php") ?>
</body>
</html>