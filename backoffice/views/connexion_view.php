<!DOCTYPE html>
<html lang="fr">

    <head>
        <?php include_once 'views/includes/head.php'; ?>
        <title><?= ucfirst($page); ?></title>
    </head>

    <body>
        <div class="container">

            <main role="main" class="container">
                
                <form action="" method="post" class="form-signin">

                    <div class="text-center mb-4">
                        <h1 class="h3 mb-3 font-weight-normal">Espace Administrateur</h1>
                        <p>Seuls les dirigeants de <code>L'Ordre du Coeur Noir</code> ont accés à cet espace. </p>
                        <p class="mt-1">Pour retourner sur le site <a href="../">cliquez ici</a></p>
                    </div>

                    <?php getMessage(); ?>

                    <div class="form-label-group" data-children-group="1">
                        <input type="email" name="email" id="email" class="form-control" required placeholder="Email" autocomplete="username">
                        <label for="email">Email</label>
                    </div>

                    <div class="form-label-group" data-children-group="1">
                        <input type="password" name="mdp" id="mdp" class="form-control" required placeholder="Mot de passe" autocomplete="current-password">
                        <label for="mdp">Mot de passe</label>
                    </div>

                    <p class="text-muted mb-3">Au cas ou tu as oublié ton mot de passe, merci de contacter les autres administrateurs.</p>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="auto" name="auto"> Se souvenir de moi
                        </label>
                    </div>

                    <button type="submit" name="btnConnexion" class="btn btn-lg btn-primary btn-block btn-dark">Se connecter</button>
                </form>

            </main><!-- /.container -->

    </body>
</html>