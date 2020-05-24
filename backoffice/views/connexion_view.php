<!DOCTYPE html>
<html lang="fr">

    <head>
        <?php include_once 'views/includes/head.php'; ?>
        <title><?= ucfirst($page); ?></title>
    </head>

    <body>
        <div class="container">
            <?php include_once 'views/includes/header.php'; ?>

            <main role="main" class="container">
                <div class="row">
                    <form action="" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" name="mdp" id="mdp">
                        <button type="submit" name="btnConnexion">Se connecter</button>
                    </form>
                </div><!-- /.row -->

            </main><!-- /.container -->

        <?php include_once 'views/includes/footer.php'; ?>
    </body>
</html>