<?php 
class Permission_user {

    public $id_user_permission;
    public $description;

    function __construct($id_user_permission){
        global $db;

        $id_user_permission = str_secure($id_user_permission);

        $req = $db->fetch('SELECT * FROM permission WHERE id_permission = ?', [], false);

        $data = $req;

        $this->id_user_permission = $id_user_permission;
        $this->description = $data['description'];
    }

    /**
     * Récupération de toutes les permissions administrateurs
     * @return array 
     */
    static function getAllAdminPermissions(){

        global $db;

        $req = $db->fetch('SELECT * FROM user_permission', [], true);

        return $req;
    }

    /**
     * Récupération de toutes les permissions utilisateur
     * @return array 
     */
    static function getAllUserPermissions(){

        global $db;

        $req = $db->fetch('SELECT * FROM user_permission', [], true);

        return $req;
    }

    /**
     * Récupere la permission de l'utilisateur
     * @param int $id_user
     * @return array
     */
    static function getUserPermission($id_user){
        
        global $db;

        $req = $db->fetch('SELECT * FROM user_permission WHERE id_user = '.$id_user.'', [], true);

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
}