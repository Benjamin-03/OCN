<?php 

class Users {

    public $id;
    public $pseudo;
    public $email;
    public $profil;
    public $password;
    public $secret;
    public $status;

    function __construct($id){
        global $db;

        $id = str_secure($id);

        $req = $db->fetch('SELECT * FROM users WHERE id_user = ?', [$id], false);

        $data = $req;

        $this->id = $id;
        $this->pseudo = $data['pseudo'];
        $this->email = $data['email'];
        $this->profil = $data['profil'];
        $this->password = $data['password'];
        $this->secret = $data['secret'];
        $this->blocked = $data['blocked'];
    }

    /**
     * Récupère tous les utilistateurs
     * @return array 
     */
    static function getAllUsers(){
        global $db;

        $req = $db->fetch('SELECT * FROM users', [], true);

        return $req;
    }
}