<?php 

class Admin {
    public $id;
    public $email;
    public $pseudo;
    public $password;
    public $secret;

    function __construct($id){
        global $db;

        $id = str_secure($id);

        $req = $db->fetch('SELECT * FROM admin WHERE id_admin = ?', [], false);

        $data = $req;

        $this->id = $id;
        $this->email = $data['email'];
        $this->pseudo = $data['pseudo'];
        $this->password = 'ako'.sha1($data['password'].'6fb').'9ik';
        $this->secret = sha1(sha1($this->email).time()).time().time();
    }

    static function getCountMailAdmin($email){
        global $db;

        $req = $db->fetch('SELECT COUNT(*) as nbEmail FROM admin WHERE email = ?', [$email], false);

        return $req;
    }

    /**
     * Envoie de toutes les autheurs
     * @return array 
     */
    static function getAllAdmins(){
        global $db;

        $req = $db->fetch('SELECT * FROM admin', [], true);

        return $req;
    }
}