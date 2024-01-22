<!-- <?php

    // Connexion à la base de donnée avec l'aide des variables d'environnements

    Define('Host', 'localhost');                    // Hébergeur ou serveur de l'app
    Define('User', 'root');                         // Utilisateur de la base de donnée
    Define('Password', "");                         // Mot de passe de la bade de donnée
    Define('Database_name', 'meko_collaborative_app'); // Nom de la base de donnée

    try
    {
        // Connexion...
        $dbcon = new mysqli(Host, User, Password, Database_name);

        // On attribue l'Unicode UTF-8 pour l'affichage des caractères spéciaux
        mysqli_set_charset($dbcon, 'utf8');
    }
    catch(Exception $e)
    {
        // Au cas ou les variables de connexion à la base de donnée contiennent des érreurs: " . $e->getMessage();
        // print "Erreur servenue lors de la connexion à la base donnée.";
        // En cas d'érreur, rediriger vers une page dédiée...
        header('location:config/error.php');
    }
    catch(Error $e)
    {
        // Exception: Si la connexion est lente. $e->getMessage();
        // print "La base de donnée est saturé, veuillez reesayez plus tard !";
    }

?> -->

<?php

    //Connexion à la base de données
    $con = mysqli_connect("localhost","root","","meko_collaborative_app");
    //gérer les accents et autres caractères français
    $req= mysqli_query($con , "SET NAMES UTF8");
    if(!$con){
        //si la connexion échoue , afficher :
        echo "Connexion échouée";
    }

?>