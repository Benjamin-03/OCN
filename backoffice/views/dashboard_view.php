<!DOCTYPE html>
<html lang="fr">

    <head>
        <?php include_once 'views/includes/head.php'; ?>
        <title><?= ucfirst($page); ?></title>
    </head>

    <body>
        <?php include_once 'views/includes/header.php'; ?>

        <div id="layoutSidenav">
            <?php include_once 'views/includes/aside.php' ?>

            <div id="layoutSidenav_content">
                <main role="main">

                    <div class="container-fluid">
                        <h1 class="h2 mt-4">Dashboard</h1>

                        <?php getMessage(); ?> 

                        <div class="row">
                            <div class="col col-md">
                                <div class="card text-dark bg-light mb-3" id="countUser">
                                    <div class="card-header text-center">
                                        <strong><?= $subscribers['nbUsers']; ?></strong>
                                        <p>Utilisateurs inscrit</p>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Objectif > 100 ?</h5>
                                        <?php if($_SESSION['permission'] >= 1){ ?>
                                            <p class="card-text">Tu as les droits d'administration n'hésites pas à gérer les utilisateurs</p>
                                            <a href="addadmin" class="mt-2 btn btn-block btn-primary">Gestion de l'équipe</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-md">
                                <div class="card text-dark bg-light mb-3" id="CountLastUser">
                                    <div class="card-header text-center">
                                        <strong>Les 5 derniers inscrits</strong>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <p>Aperçue des derniers arrivants</p>
                                        </h5>
                                        <?php if($_SESSION['permission'] >= 1){ ?>
                                            <p class="card-text">Tu as les droits d'administration n'hésites pas à gérer les utilisateurs</p>
                                            <a href="addadmin" class="mt-2 btn btn-block btn-primary">Gestion de l'équipe</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pseudo</th>
                                            <th scope="col">Date d'inscription</th>
                                            <th scope="col">Bloqué</th>
                                            <th scope="col">Permission</th>
                                        </tr>
                                    </thead>
                                    <?php foreach($lastSubscribers as $user) : ?>
                                        <tr>
                                            <th scope="row"><?= $user['pseudo'] ?></th>
                                            <td><?= date_format(date_create($user['date_add']), 'd/m/y H:i:s'); ?></td>
                                            <td><?php if($user['blocked'] == 1){echo 'bloqué';} else {echo 'Libre';} ?></td>
                                            <td><?php if($user['id_user_permission'] == 0){ echo 'Normal'; } else if($user['id_user_permission'] == 1){ echo 'Avancé'; } ?></td>
                                        </tr>
                                    <?php endforeach; ?> 
                                </table>
                            </div>

                        </div>
                        
                    </div>   

                </main>
            </div>
            
        </div>
                

        <?php include_once 'views/includes/footer.php'; ?>
    </body>
</html>