<?php 

if(!isset($_SESSION['connect'])){
    displayError('connexion', 'Tu dois être connécté pour accéder à cette page, bien tenté ;)');
} 

$subscribers = Users::getCountUser();
$lastSubscribers = Users::getResumeLastUsers();
