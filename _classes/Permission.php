<?php 
class Permission {

    public $id_permission;
    public $niveau;
    public $description;

    function __construct($id_permission){
        global $db;

        $id_permission = str_secure($id);

        $req = $db->fetch('SELECT * FROM permission WHERE id_permission = ?', [], false);

        $data = $req;

        $this->id_permission = $id_permission;
        $this->niveau = $data['niveau'];
        $this->description = $data['description'];
    }

    /**
     * Récupération de toutes les permissions administrateurs
     * @return array 
     */
    static function getAllAdminPermissions(){

        global $db;

        $req = $db->fetch('SELECT * FROM permission', [], true);

        return $req;
    }

    /**
     * Récupération de toutes les permissions utilisateur
     * @return array 
     */
    static function getAllUserPermissions(){

        global $db;

        $req = $db->fetch('SELECT * FROM status', [], true);

        return $req;
    }

    /**
     * Récupere la permission de l'utilisateur
     * @param int $id_user
     * @return array
     */
    static function getUserPermission($id_user){
        
        global $db;

        $req = $db->fetch('SELECT * FROM status WHERE id_user = '.$id_user.'', [], true);

        return $req;
    }

    /**
     * Récupere la permission de l'administrateur
     * @param int $id_admin
     * @return array
     */
    static function getAdminPermission($id_admin){
        
        global $db;

        $req = $db->fetch('SELECT * FROM permission WHERE id_admin = '.$id_admin.'', [], true);

        return $req;
    }

    /**
     * Récupère toutes les descriptions des permission utilisateurs
     * @return array
     */
    static function getAllUsersPermissions(){

        global $db;

        $reqUP = $db->fetch('SELECT * FROM user_permission', [], true);

        return $reqUP;
    }

    /**
     * Récupère toutes les descriptions des permission administrateurs
     * @return array
     */
    static function getAllAdminsPermissions(){

        global $db;

        $req = $db->fetch('SELECT * FROM admin_permission', [], true);

        return $req;
    }
}