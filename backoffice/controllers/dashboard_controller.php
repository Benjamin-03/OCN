<?php 

if(!isset($_SESSION['connect'])){
    header('location: connexion');
    exit();
}

if(!empty($_POST) && isset($_POST['btnConnexion'])){
    if(isset($_POST['email']) && isset($_POST['mdp'])){
        if(!empty($_POST['email']) && !empty($_POST['mdp'])){

            $email = str_secure($_POST['email']);
            $mdp = str_secure($_POST['mdp']);
        
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header('location: connexion?error=1invalid_mail=1');
                exit();
            }

            $count = Admin::getCountMailAdmin($email);
            
            if($count != 0){

                $log = Log::getAdminFromEmail($email);
                var_dump($log);

                if($log['password'] == $mdp){
                    $_SESSION['connect'] = 1;
                    $_SESSION['secret'] = $log['secret'];

                    if(isset($_POST['auto'])){
                        setcookie('auth', $log['email'], time()+364*24*3600, '/', null, false, true);
                    }
                }

            } else {
                $error = 'Compte inexistant';

            }
        } else {
            $error = 'Vous devez remplir tous les champs !';
        }
    } else {
        $error = 'Une erreur s\'est produite, veuillez réessayer !';
    }
}