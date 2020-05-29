<?php 

/*
 * Fonction qui récupère le javascript dans un fichier et l'injecte dans le DOM
*/
function registerJavascript(){
    $manifest = file_get_contents("http://localhost/OCN/backoffice/assets/js/manifest.json");
    $js = json_decode($manifest, JSON_FORCE_OBJECT);

     $scripts = [
         'custom' => '<script src="http://localhost/OCN/backoffice/assets/js/custom.js" type="module"></script>',
        //  'jquery' => '<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>',
         'main-theme-js' => '<script type="text/javascript" src="http://localhost/OCN/backoffice/assets/js/'.$js['backoffice.js'].'"></script>',
        //  'popper' => '<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>',
        //  'bootstrap' => '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>',
         'main-theme-sourcemap-js' => '<script type="text/javascript" src="http://localhost/OCN/backoffice/assets/js/'.$js['backoffice.js.map'].'"></script>',
        // 'bootstrap' => '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>'
     ];

    foreach($scripts as $script){
        echo $script;
    }
}

registerJavascript();