<?php 

/*
 * Fonction qui récupère le style dans un fichier et l'injecte dans le DOM
*/
function registerStylesheet(){
    $manifest = file_get_contents("http://localhost/OCN/backoffice/assets/js/manifest.json");
    $css = json_decode($manifest, JSON_FORCE_OBJECT);
    $css['backoffice.css'] = substr($css['backoffice.css'],7);

    $styles = [
        'main-theme-css' => '<link rel="stylesheet" href="http://localhost/OCN/backoffice/assets/css/'.$css['backoffice.css'].'">',
        'main-theme-sourcemap-css' => '<link rel="stylesheet" href="http://localhost/OCN/backoffice/assets/css/'.$css['backoffice.css.map'].'">',
        // 'boostrap-css' => '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">'
    ];
    
    foreach($styles as $style){
        echo $style;
    }
}

registerStylesheet();