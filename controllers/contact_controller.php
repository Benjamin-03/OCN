<?php 

if(!empty($_POST) && isset($_POST['btnContact'])){
    if(isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['message'])){
        if(!empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['message'])){
            $email = str_secure($_POST['email']);
            $firsname = str_secure($_POST['firstname']);
            $message = str_secure($_POST['message']);

            $message .= ' - email envoyé par: '.$firsname.' : '.$email;
            debug($message);

            mail('benjamin@france-automatismes.com', 'On me contact sur monsite', $message);

        } else {
            $error = 'Vous devez remplir tous les champs !';
        }
    } else {
        $error = 'Une erreur s\'est produite, veuillez réessayer !';
    }   
}