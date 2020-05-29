<?php 
session_unset();
session_destroy();

setcookie('auth', '', time()-1, '/', null, false, true);
displaySuccess('connexion', 'T\'es bien déconnecté du site en toute sécurité');

exit();