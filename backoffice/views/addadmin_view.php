<!DOCTYPE html>
<html lang="fr" id="<?= $page ?>">
    <head>
        <?php include_once 'views/includes/head.php'; ?>
        <title><?= ucfirst($page); ?></title>
    </head>

    <body>
        <?php include_once 'views/includes/header.php'; ?>

        <div id="layoutSidenav">
            
            <?php include_once 'views/includes/aside.php'; ?>

            <div id="layoutSidenav_content">

                <main role="main">                    

                    <div class="container-fluid">
                        
                        <h1 class="h1 mt-4">Géstion de l'équipe</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Ajouter un administrateur</li>
                        </ol>

                        <div class="row">

                            <div class="col-12">
                                <?php getMessage(); ?>
                            </div>

                            <div class="col col-lg-12 col-xl">
                                <h2 class="h3">Administrateurs</h2>
                                <form action="" method="post">
                                    <table class="table table-striped table-bordered">
                                        
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Séléction</th>
                                                <th scope="col">Id</th>
                                                <th scope="col">Pseudo</th>
                                                <th scope="col">Date d'ajout</th>
                                                <th scope="col">Permission</th>
                                            </tr>
                                        </thead>
                                        <?php foreach($admins as $index => $admin) : ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" 
                                                        name="selectAdmins[]" 
                                                        value="<?= $admin['id_admin'] ?>" 
                                                        id="check_<?= $admin['id_admin'] ?>"
                                                    >
                                                    </td>
                                                <td><?= $admin['id_admin']; ?></td>
                                                <td><?= $admin['pseudo']; ?></td>
                                                <td><?= date_format(date_create($admin['date_add']), 'd/m/y'); ?></td>
                                                <td>
                                                    <?php if($admin['id_admin_permission'] == 0) { 
                                                        echo 'Simple administrateur';
                                                    } else if($admin['id_admin_permission'] == 1) { 
                                                        echo 'Super Administrateur';
                                                    }?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>

                                    <div class="input-group">
                                        <select class="custom-select" name="actionsAdmin" id="actionsAdmin" aria-label="Choisis ton action">
                                            
                                            <option disabled selected>Choisis ton action</option>

                                            <optgroup label="Changer les permissions">
                                                <?php foreach($adminPermissions as $index => $permission) : ?>
                                                    <option value="<?= $permission['niveau'] ?>">
                                                        <?= $permission['description'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </optgroup>

                                            <optgroup label="Supprimer les administrateurs">
                                                    <option value="suppr_admin">Supprimer l'administrateur</option>
                                            </optgroup>
                                        </select>

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-primary" name="submit_admin" id="submit_admin">
                                                Exécuter l'action pour les administrateurs
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>

                            <div class="col col-lg-12 col-xl">
                                <h2 class="h3">Utilisateurs</h2>
                                <form action="" method="post">
                                    <table class="table table-striped table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Séléction</th>
                                                <th scope="col">Id</th>
                                                <th scope="col">Pseudo</th>
                                                <th scope="col">Date d'inscription</th>
                                                <th scope="col">Bloqué</th>
                                                <th scope="col">Permission</th>
                                            </tr>
                                        </thead>
                                        
                                        <?php foreach($users as $index => $user) : ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" 
                                                        name="selectUsers[]" 
                                                        value="<?= $user['id_user'] ?>" 
                                                        id="check_<?= $user['id_user'] ?>"
                                                    >
                                                </td>
                                                <td><?= $user['id_user']; ?></td>
                                                <td><?= $user['pseudo']; ?></td>
                                                <td><?= date_format(date_create($user['date_add']), 'd/m/y'); ?></td>
                                                <td><?php if($user['blocked'] == 0){echo 'Libre';} else {echo 'Bloqué';} ?></td>
                                                <td><?php if($user['id_user_permission'] == 0){ echo 'Normal'; } else if($user['id_user_permission'] == 1){ echo 'Avancé'; } ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>

                                    <div class="input-group">

                                        <select class="custom-select" name="actionsUser" id="actionsUser" aria-label="Choisis ton action">
                                            
                                            <option disabled selected>Choisis ton action</option>

                                            <optgroup label="Changer les permissions">
                                                <?php foreach($userPermissions as $index => $permission) : ?>
                                                    <option value="<?= 'uPerm_'.$permission['niveau']; ?>">
                                                        <?= $permission['description']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </optgroup>

                                            <optgroup label="Bloquer l'utilisateur">
                                                <option value="bloqueU_1">Bloqué l'utilisateur</option>
                                                <option value="bloqueU_0">Débloqué l'utilisateur</option>
                                            </optgroup>

                                            <optgroup label="Passé administrateur">
                                                <option value="passAdmin">Passé administrateur</option>
                                            </optgroup>

                                        </select>

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-primary" name="submit_user" id="submit_user">
                                                Exécuter l'action pour les utilistateurs
                                            </button>
                                        </div>
                                    </div>

                                    
                                </form>
                            </div>
                            
                        </div>
                        
                    </div>

                </main>

            </div>
        </div>

        <?php include_once 'views/includes/footer.php'; ?>
    </body>
</html>