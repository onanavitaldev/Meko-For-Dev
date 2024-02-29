<!-- Inclure le script de configuration de la base de donnée -->
<?php include ("config/conn.php"); ?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <!-- Meta données(Mots clés, description, robots...) -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Chemin d'accès menant vers les fichiers scss -->
    <?php require("src/components/link.php"); ?>

    <!-- Titre -->
    <title>@users - Envoyez un mail</title>
</head>

<body>
    <!-- Sidebar: Outils -->
    <?php include("src/components/sidebar.php") ?>

    <!-- Formulaire d'envoi de mail -->
    <div class="p-6 sm:p-12 pt-1 sm:pt-1" id="send_mail_box">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-10 lg:px-6">
            <div class="max-w-screen-md">
                <h2 class="mb-4 text-2xl sm:text-6xl font-extrabold text-white" style="line-height:1.2;">
                    <b>Meko Mail</b>
                </h2>
                <p class="text-gray-400 sm:text-xl">
                    Envoyer facilement des SMS à n'importe quel contact téléphonique sans faire appel à votre téléphone portable.
                </p>
            </div>
            <div class="mr-64 flex flex-wrap" id="form">
                <div class="w-full sm:mb-2 px-4 py-12 sm:px-3 sm:py-10 lg:w-1/2 lg:px-8 lg:py-20" id="infos">
                    <form action="https://formsubmit.co/app@meko.com" method="post" class="mx-auto w-full mb-0 max-w-md space-y-4 -mt-6">
                        <div>
                            <label for="name" class="sr-only">Nom & Prénom</label>
                            <div class="relative">
                                <input type="text" class="w-full rounded-lg p-4 pe-12 text-sm shadow-sm" placeholder="Nom & Prénom" name="Nom & Prénom" />
                            </div>
                        </div>
                        <div>
                            <label for="email" class="sr-only">Email</label>
                            <div class="relative">
                                <input type="email" class="w-full rounded-lg p-4 pe-12 text-sm shadow-sm" placeholder="Adrèsse E-mail" name="email" />
                            </div>
                        </div>
                        <div>
                            <label for="phone" class="sr-only">Méssage</label>
                            <div class="relative">
                                <textarea name="Méssage" id="text" cols="30" rows="10" class="w-full rounded-lg p-4 pe-12 text-sm shadow-sm" placeholder="Exprimez-vous..."></textarea>
                            </div>
                        </div>
                        <button type="submit" class="w-full inline-block p-4 px-6 py-3 text-sm font-medium text-white hover:shadow-lg">
                            Envoyez le méssage
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer: Informations complémentaires -->
    <?php include("src/components/footer.php") ?>

    <!-- Script: Chemins d'accès vers les fichiers JavaScript -->
    <?php include("src/components/script.php") ?>
</body>

</html>