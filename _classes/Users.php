<?php 

class Authors {

    public $id;
    public $pseudo;
    public $email;
    public $profil;
    public $password;
    public $secret;

    function __construct($id){
        global $db;

        $id = str_secure($id);

        $req = $db->fetch('SELECT * FROM users WHERE id_user = ?', [], false);

        $data = $req;

        $this->id = $id;
        $this->pseudo = $data['pseudo'];
        $this->email = $data['email'];
        $this->profil = $data['profil'];
        $this->password = $data['password'];
        $this->secret = $data['secret'];
    }

    /**
     * Envoie de toutes les auteurs
     * @return array 
     */
    static function getAllUsers(){
        global $db;

        $req = $db->fetch('SELECT * FROM users', [], true);

        return $req;
    }
}