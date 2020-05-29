<?php 
class Permission_admin {

    public $id_admin_permission;
    public $description;

    function __construct($id_admin_permission)
    {
        
        global $db;

        $id_admin_permission = str_secure($id_admin_permission);

        $req = $db->fetch('SELECT * FROM admin_permission WHERE id_permission = ?', [], false);

        $data = $req;

        $this->id_admin_permission = $id_admin_permission;
        $this->description = $data['description'];
    }

    /**
     * Récupération de toutes les permissions administrateurs
     * @return array 
     */
    static function getAllAdminPermissions()
    {

        global $db;

        $req = $db->fetch('SELECT * FROM admin_permission', [], true);

        return $req;
    }

    /**
     * Récupération de toutes les permissions utilisateur
     * @return array 
     */
    static function getAllUserPermissions()
    {

        global $db;

        $req = $db->fetch('SELECT * FROM status', [], true);

        return $req;
    }

    /**
     * Récupere la permission de l'utilisateur
     * @param int $id_user
     * @return array
     */
    static function getAdminPermission($id_admin)
    {
        
        global $db;

        $req = $db->fetch('SELECT * FROM admin_permission WHERE id_admin = '.$id_admin.'', [], true);

        return $req;
    }

    /**
     * Récupère toutes les descriptions des permission utilisateurs
     * @return array
     */
    static function getAllAdminsPermissions()
    {

        global $db;

        $reqAP = $db->fetch('SELECT * FROM admin_permission', [], true);

        return $reqAP;
    }
}