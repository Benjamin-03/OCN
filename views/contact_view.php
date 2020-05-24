<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once('views/includes/head.php'); ?>
    <title>L'Ordre du Coeur Noir - <?= ucfirst($page); ?></title>
</head>

<body>
    <div class="container">
        <?php include_once('views/includes/header.php'); ?>
    </div>

    <main role="main" class="container">
        <h1 class="pb-4 mb-4 font-italic border-bottom">
            <?= ucfirst($page); ?>
        </h1>

        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Doe@John.com">
            </div>
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="John">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" id="message" rows="8" placeholder="Mon message ..."></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mb-2" name="btnContact">Envoyer mon message</button>
            </div>
        </form>


    </main><!-- /.container -->

    <?php include_once('views/includes/footer.php'); ?>
</body>

</html>