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
           include "config/conn.php";
           // extraire les infos du formulaire
           extract($_POST);
           // verifions si les champs sont vides
           if(isset($email) && isset($mdp1) && $email != "" && $mdp1 != ""){
               // verifions si les identifiants sont justes
               //Impossible de décrypter le mot de passe, on donc crypter de la même manière pour vérifier 
               $mdp1 = md5(md5($mdp1));
               $req = mysqli_query($dbcon , "SELECT * FROM users WHERE email = '$email' AND password = '$mdp1'");
               if(mysqli_num_rows($req) > 0){
                   // si les identifiants sont justes
                   // Création d'une session qui contient l'email
                   $message = "Connecté; redirection en cours.";
                   $_SESSION['user'] = $email ;
                   // redirection vers la page de Chat/Conversation
                   header("location:load.php");
               }else {
                   // si non
                   $message = "Email ou Mot de passe incorrect(s) !";
               }
           }else {
               // si les champs sont vides
               $message = "Veuillez remplir tous les champs !" ;
           } ?>
           <p class="text-1xl text-center text-gray-500 mb-6">
            <?= $message; ?>
        </p>
       <?php }
    ?>
    <!-- Formulaire de connexion -->
    <form action="" method="POST" class="form_connexion_inscription">
        <h1 class="font-bold text-center text-white text-3xl pt-10">Connexion</h1>
        <p class="text-1xl text-center text-gray-500 mb-6">
            Bon retour. Connectez-vous pour accéder à vos outils de productivité.
        </p>
        <br>
        <input type="email" placeholder="Votre adresse email" name="email" class="mb-4">
        <input type="password" placeholder="Votre mot de passe" name="mdp1">
        <input type="submit" class="shadow-lg btn" value="Se connecter" name="login" style="background-color:var(--red);">
        <p class="link text-white">Vous êtes nouveau ici ?  <br>
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