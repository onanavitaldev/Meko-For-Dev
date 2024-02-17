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
<body class="flex justify-around pt-5">
    <form action="" method="POST" class="form_connexion_inscription" autocomplete="off">
        <h1 class="font-bold text-3xl text-white text-center pt-6">Inscrivez-vous</h1>
        <?php
            // On génère le code du captcha.
            $num = rand(2340, 9999);
            $text = str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
            $final = substr($text, 0, 2);
            $captcha = $num.$final;
        ?>

    <?php 
        // On commence d'abord par vérifier si le formulaire a été soumis.
        if (isset($_POST['submit'])) {
            $code = "Echec";
            // On extrait ensuite le formulaire.
            extract($_POST);
            // On se connecte à la base de données.
            include 'config/conn.php';
            // On vérifie si l'email est valide et n'existe pas dans la base.
            include 'src/uniques/validEmail.php';
            $req = mysqli_query($dbcon , "SELECT * FROM users WHERE email = '$email'");
            if (!checkEmail($email) || mysqli_num_rows($req) > 0) {
                $message = "Email invalide ou existe déja !";
            } else {
                # Sinon on continue en vérfiant si les deux mots de passe sont conformes.
                if ($mdp1 != $mdp2) {
                    $message = "Les deux mots de passe sont différents.";
                } else {
                    # On génère l'identifiant unique.
                    include 'src/uniques/identifier.php';
                    $id = getUniqueIdentifier(10); # size = 10
                    #On hache le mot de passe en faisant un double hashage en md5.
                    $mdp1 = md5(md5($mdp1));
                    # On fini finalement par inscrire l'utilisateur...
                    $req = mysqli_query($dbcon , "INSERT INTO `users` (`unique_identifier`, `name`, `username`, `email`, `password`, `bio`, `work`) VALUES ('$id', '$name', '$username', '$email', '$mdp1', 'Hey Je suis sur Meko', '$work');");
                    // On vérfie ensuite si l'inscription n'a pas craché...
                    if($req){
                        $code = "Succès";
                        $message = "Votre compte a été créé avec succès !";
                    }
                    else {
                        $message = "Une erreur est survenue, veuillez réessayer !";
                    }
                    
                    
                }
                
            }
            ?>
            <h1 class="font-bold text-3xl text-white text-center pt-6"><?= $code; ?></h1>
            <p class="text-center text-1xl text-gray-500 mb-6"><?= $message; ?></p>
            <?php if ($code == "Echec") { ?>
                    <a href="sign-up.php" class="text-white text-2xl pt-2 pb-2 text-center">Réessayer</a>
                <?php } else { ?>
                    <a href="sign-in.php" class="text-white text-2xl pt-2 pb-2 text-center">Se connecter</a>
               <?php } ?>
            
            
    <?php } 
    
    else { 
        
    ?>
      
        <p class="text-center text-1xl text-gray-500 mb-6">
            Créez rapidement votre compte <span class="font-bold">Meko</span> et montez en productivité.
        </p>
        
        <p class="message_error"></p>
        <input type="text" class="mb-4" name="name" placeholder="Votre nom" autocomplete="off">
        <input type="text" class="mb-4" name="username" placeholder="Nom d'utilisateur" autocomplete="off">
        <input type="text" class="mb-4" name="work" placeholder="Votre profession">
        <input type="email" class="mb-4" name="email" placeholder="Votre adresse email">
        <input type="password" name="mdp1" placeholder="Choisir un mot de passe" class="mdp1 mb-4" autocomplete="off">
        <input type="password" name="mdp2" placeholder="Confirmer le mot de passe" class="mdp2">
        <!-- <br>
        <input type="text" name="captchacode" placeholder="Entrez le code Captcha ci-dessous" class="mdp2">
        <br>
        <input type="text" name="" value="Code Captcha: <?= $captcha; ?>" class="mdp2" readonly style="background-color: var(--red); text-align:center; font-weight: 800;"> -->
        <input type="submit" value="Je m'inscris" class="btn shadow-lg" name="submit">
        <p class="text-center mb-2 mt-2 text-white">
            En cliquant sur "Je m'inscris", vous avez lu et approuvé les <a href="#" class="text-gray-500"> termes et conditions d'utilisation de Meko.</a>
        </p>
        <p class="link text-white">
            Vous avez déja un compte ? <br>
            <a href="sign-in.php">Se connecter</a>
        </p>
        <?php } ?>
    </form>

    <!-- Footer: Informations complémentaires -->
    <?php include("src/components/footer.php") ?>

    <!-- Script: Chemins d'accès vers les fichiers JavaScript -->
    <?php include("src/components/script.php") ?>
</body>
</html>