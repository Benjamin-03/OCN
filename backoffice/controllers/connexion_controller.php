<?php 

if(!empty($_POST) && isset($_POST['btnConnexion'])){
    if(isset($_POST['email']) && isset($_POST['mdp'])){
        if(!empty($_POST['email']) && !empty($_POST['mdp'])){
            
            $email = str_secure($_POST['email']);
            $mdp = str_secure($_POST['mdp']);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                displayError('connexion', 'Fait attention, il y a surement une erreur dans ton mail !');
            }

            if((int)Admin::getCountMailAdmin($email)['nbEmail'] != 0){

                $log = Log::getAdminFromEmail($email);

                if($log['password'] === $mdp){

                    $_SESSION['connect'] = 1;
                    $_SESSION['pseudo'] = $log['pseudo'];
                    $_SESSION['secret'] = $log['secret'];
                    $_SESSION['permission'] = $log['id_admin_permission'];

                    if(isset($_POST['auto'])){
                        setcookie('auth', $_SESSION['secret'], time()+364*24*3600, '/', null, false, true);
                    }
                    
                    if(isset($_SESSION['connect'])){
                        displaySuccess('dashboard', 'Salut '.$_SESSION['pseudo'].' ça gaz ?');
                    }

                } else {
                    displayError('connexion', 'Une boulette dans l\'email ? Ou peut-être dans le mot de passe ...');
                }
 
            } else {
                displayError('connexion', 'T\'es pas autorisé à entrer, bien tenté ...');
            }

        } else {
            displayError('connexion', 'Hop Hop Hop, il manque des champs à remplir !');
        }
        
    } else {
        displayError('connexion', 'Une erreur d\'origine inconnue est arrivée, retente un coup pour voir ...');
    }
}