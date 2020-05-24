<?php 

/*
 * Fonction qui récupère le javascript dans un fichier et l'injecte dans le DOM
*/
function registerJavascript(){
    $manifest = file_get_contents("http://localhost/OCN/assets/js/manifest.json");
    $js = json_decode($manifest, JSON_FORCE_OBJECT);

     $scripts = [
        'main-theme-js' => '<script type="text/javascript" src="http://localhost/OCN/assets/js/'.$js['theme.js'].'" async></script>',
        'main-theme-sourcemap-js' => '<script type="text/javascript" src="http://localhost/OCN/assets/js/'.$js['theme.js.map'].'" async></script>'
     ];

    foreach($scripts as $script){
        echo $script;
    }
}

registerJavascript();