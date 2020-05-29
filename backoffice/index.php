<?php 

include_once '_config/config.php';
include_once '_classes/Autoloader.php';
include_once '_functions/functions.php';

Autoloader::register();
include_once '_config/db.php';

// definition de la page courante
if(isset($_GET['page']) && !empty($_GET['page'])){
    $page = trim(strtolower($_GET['page']));
} else {
    $page = 'home';
} 

// array contenant toutes les pages
$allPages = scandir('controllers/');

if(in_array($page.'_controller.php', $allPages)){

    // inclusion de la page
    include_once 'models/'.$page.'_model.php';
    include_once 'controllers/'.$page.'_controller.php';
    include_once 'views/'.$page.'_view.php';
    
} else {
    echo 'Erreur 404';
}