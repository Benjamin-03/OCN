<?php 

class Users {

    public $id;
    public $id_user_permission;
    public $pseudo;
    public $email;
    public $profil;
    public $password;
    public $secret;
    public $blocked;

    function __construct($id){
        global $db;

        $id = str_secure($id);

        $req = $db->fetch('SELECT * FROM users WHERE id_user = ?', [], false);

        $data = $req;

        $this->id = $id;
        $this->pseudo = $data['pseudo'];
        $this->email = $data['email'];
        $this->profil = $data['profil'];
        $this->id_user_permission = $data['id_user_permission'];
        $this->password = $data['password'];
        $this->secret = $data['secret'];
        $this->blocked = $data['blocked'];
    }

    /**
     * Envoie de toutes les auteurs
     * @return array 
     */
    static function getAllUsers(){

        global $db;

        $req = $db->fetch('SELECT * FROM users ORDER BY id_user DESC', [], true);

        return $req;
    }

    /**
     * Récupère les 5 derniers inscrit
     * @return array 
     */
    static function getResumeLastUsers(){

        global $db;

        $req = $db->fetch('SELECT * FROM users ORDER BY id_user DESC LIMIT 5', [], true);

        return $req;
    }

    /**
     * Récupére le nombre d'utilisateur inscrit sur le site
     * @return array
     */
    static function getCountUser(){

        global $db;

        $req = $db->fetch('SELECT COUNT(*) AS nbUsers FROM users', [], false);

        return $req;
    }
}