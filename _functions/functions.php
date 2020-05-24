<?php

/**
 * Permet de sécuriser une chaine de caractère
 * @param $string
 * @return string 
 */
function str_secure($string){
    return trim(htmlspecialchars($string));
}

/**
 * Permet de rendre plus lisible le debug
 * @param $var
 */
function debug($var){
    echo '<pre>';
        var_dump($var);
    echo '</pre>';
}
/**
 * Détecte le language dans l'url
 */
function getUserLanguage(){
    if(isset($_GET['lang']) && !empty($_GET['lang'])){
        $lang = str_secure(strtolower($_GET['lang']));
        $availableLanguage = ['en', 'fr'];

        return (in_array($lang, $availableLanguage)) ? $lang : DEFAULT_LANGUAGE;
    } else {
        return (isset($_SESSION['lang']) && !empty($_SESSION['lang'])) ? $_SESSION['lang'] : DEFAULT_LANGUAGE;
    }
}

function getPageLanguage($lang, $pages){
    
    $dataPage = [];

    foreach($pages as $page){
        $jsonString = file_get_contents('_lang/'.$lang.'/'.$page.'.json');
        $json = json_decode($jsonString);
        $dataPage[$page] = $json;
    }

    return (object) $dataPage;
}
