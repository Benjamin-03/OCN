<?php 

class Admin {
    public $id;
    public $id_admin_permission;
    public $pseudo;
    public $email;
    public $password;
    public $secret;
    public $blocked;

    function __construct($id)
    {

        global $db;

        $id = str_secure($id);

        $req = $db->fetch('SELECT * FROM admin WHERE id_admin = ?', [$id], false);

        $data = $req;

        $this->id = $id;
        $this->email = $data['email'];
        $this->pseudo = $data['pseudo'];
        $this->id_admin_permission = $data['id_admin_permission'];
        $this->password = 'ako'.sha1($data['password'].'6fb').'9ik';
        $this->secret = sha1(sha1($this->email).time()).time().time();
        $this->blocked = $data['blocked'];
    }
    /**
     * Vérifie si un email existe déjà en bdd
     * @param string email email
     * @return int
     */
    static function getCountMailAdmin($email)
    {

        global $db;

        $req = $db->fetch('SELECT COUNT(*) as nbEmail FROM admin WHERE email = ?', [$email], false);

        return $req;
    }

    /**
     * Envoie de toutes les autheurs
     * @return array 
     */
    static function getAllAdmins()
    {

        global $db;

        $req = $db->fetch('SELECT * FROM admin ORDER BY id_admin DESC', [], true);

        return $req;
    }
}