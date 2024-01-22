<!-- Inclure le script de configuration de la base de donnée -->
<?php include("config/config_task.php") ?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <!-- Meta données(Mots clés, description, robots...) -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Chemin d'accès menant vers les fichiers scss -->
    <?php require("src/components/link.php"); ?>

    <!-- Titre -->
    <title>Meko - Outils de collaboration</title>
</head>
<style>
    body{overflow: hidden;}
    #nav_left{display:none;}
</style>
<body>
    <nav class="nav fixed w-full top-0 pt-6" style="z-index:999;">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <img src="assets/img/logo.png" class="h-10 mr-2" alt="Meko" />
                <span class="font-bold text-white text-2xl">Meko</span>
            </a>
            <div class="flex md:order-2">
                <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden focus:outline-none focus:ring-4 focus:ring-gray-200 rounded-lg text-sm p-2.5 mr-1">
                    <a href="#" title="Télécharger Meko">
                        <img src="assets/icons/download.png" height="23" width="23">
                    </a>
                </button>
                <div class="relative flex items-center hidden md:flex">
                    <a href="sign-up.php" class="text-gray-200 font-bold mr-6 hover:shadow-lg">Créer un compte</a>
                    <a href="freelance/signup.php" class="btn flex items-center align-middle hover:shadow-lg" style="border:none;">
                        <img src="assets/icons/download.png" class="mr-2" height="16" width="16">
                        Télécharger Meko
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HomePage -->
    <section class="flex flex-wrap justify-around h-full w-full sm:h-full pb-20" id="header_startPage">
        <div class="flex flex-wrap justify-center pt-40 sm:pt-56
         p-2 sm:p-32 h-full sm:h-full">
         <div class="block">
            <h1 class="font-bold text-white text-center text-3xl sm:text-6xl mb-10" style="line-height:1.3;">
                Offrez-vous une meilleure <br> solution de communication <br> avec vos collègues. 
            </h1>
            <p class="flex justify-center">
                <a href="sign-in.php" class="btn flex w-64 items-center align-middle hover:shadow-lg">
                    <span class="text-center">Connectez-vous à Meko</span>
                </a>
            </p>
         </div>
        </div>
    </section>

    <!-- Footer: Informations complémentaires -->
    <?php include("src/components/footer.php") ?>

    <!-- Script: Chemins d'accès vers les fichiers JavaScript -->
    <?php include("src/components/script.php") ?>
</body>

</html>