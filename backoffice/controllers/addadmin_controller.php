<?php

if(!isset($_SESSION['connect'])){
    displayError('connexion', 'Tu dois être connécté pour accéder à cette page ;)');
}

if($_SESSION['permission'] < 1){
    displayError('dashboard', 'Ta pas la permission d\'accéder à cette page, désolé bro');
}


$users = Users::getAllUsers();
$admins = Admin::getAllAdmins();

$adminPermissions = Permission_admin::getAllAdminsPermissions();
$userPermissions = Permission_user::getAllUsersPermissions();

if(isset($_POST['submit_admin'])){

    // traitement du formulaire des administrateurs
    if(isset($_POST['selectAdmins'])){
        $selectAdmins = implode(',', $_POST['selectAdmins']);

        if(isset($_POST['actionsAdmin'])){
            $actionsAdmin = $_POST['actionsAdmin'];

            if($actionsAdmin == 'suppr_admin'){
                $db->execute('DELETE FROM admin WHERE id_admin IN ('.$selectAdmins.')', [], false);
                displaySuccess('addadmin', 'L\'administrateur a bien été supprimé');
            }

            if($actionsAdmin == 0 || $actionsAdmin == 1){
                $db->execute('UPDATE admin SET id_admin_permission = ? WHERE id_admin IN ('.$selectAdmins.')', [$actionsAdmin], false);
                displaySuccess('addadmin', 'Les permissions sont changés');
            }
            
        } else {
            displayError('addadmin', 'Si tu choisis pas d\'action pour un administrateur, ca va pas le faire !');
        }
        
    } else {
        displayError('addadmin', 'Tu dois séléctionner des administrateurs en fait ...');
    }
}

if(isset($_POST['submit_user'])){

    // Traitement du formulaire des utilistateurs
    if(isset($_POST['selectUsers'])){

        $selectUsers = implode(',', $_POST['selectUsers']);

        if(isset($_POST['actionsUser'])){

            $actionsUser = $_POST['actionsUser'];

            $usersInfo = $db->fetch('SELECT password, pseudo, secret, email, id_user_permission FROM users WHERE id_user IN ('.$selectUsers.')', [], false);
            
            $uPerms = [];
        
            foreach($users as $user){
                $uPerms[] = $user['id_user_permission'];
            }

            if($actionsUser == 'uPerm_1'){
                foreach($usersInfo as $user){
                    if(!in_array($user['id_user_permission'], (string)$uPerms)){
                        $reqU = $db->execute('UPDATE users SET id_user_permission = 1 WHERE id_user IN ('.$selectUsers.')', [], false);
                        displaySuccess('addadmin', 'Permission(s) changée(s) !');
                    } else {
                        displayError('addadmin', 'Un utilisateur séléctionné a déjà la permission appliquée');
                    }
                }

            } else if($actionsUser == 'uPerm_0'){
                foreach($usersInfo as $user){
                    if(!in_array($user['id_user_permission'], (string)$uPerms)){
                        $db->execute('UPDATE users SET id_user_permission = 0 WHERE id_user IN ('.$selectUsers.')', [], false);
                        displaySuccess('addadmin', 'Permission(s) changée(s) !');
                    } else {
                        displayError('addadmin', 'Un utilisateur séléctionné a déjà la permission appliquée');
                    }
                }
            }
            

            if($actionsUser == 'bloqueU_0'){
                $db->execute('UPDATE users SET blocked = 0 WHERE id_user IN ('.$selectUsers.')', [], false);
                displaySuccess('addadmin', 'Utilisateur bloqué');

            } else if($actionsUser == 'bloqueU_1'){
                $db->execute('UPDATE users SET blocked = 1 WHERE id_user IN ('.$selectUsers.')', [], false);
                displaySuccess('addadmin', 'Utilisateur débloqué');
            }

            if($actionsUser == 'passAdmin'){
                
                $userInfo = $db->fetch('SELECT password, pseudo, secret, email FROM users WHERE id_user IN ('.$selectUsers.')', [], false);
                
                $adminEmail = [];
    
                foreach($admins as $admin){
                    $adminEmail[] = $admin['email'];
                }

                foreach($userInfo as $user){
                    if(!in_array($userInfo['email'], $adminEmail)){
                        $db->execute('INSERT INTO admin (password, pseudo, secret, email) VALUES(?, ?, ?, ?)', [$userInfo['password'], $userInfo['pseudo'], $userInfo['secret'], $userInfo['email']], false);
                        displaySuccess('addadmin', 'L\'utilisateur est passé administrateur');
                    } else {
                        displayError('addadmin', 'l\'utilisateur est déjà administrateur');
                    }
                }
                
            }
            
        } else {
            displayError('addadmin', 'Tu dois choisir une action, ca marchera mieux ...');
        }
    } else {
        displayError('addadmin', 'Si tu sélélectionnes des gens ca ira mieux déjà ...');
    }
    
}