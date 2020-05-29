<?php 

class Log {

    static function getCountAccountFromSecret($secret)
    {
        global $db;
        
        $req = $db->fetch('SELECT COUNT(*) as adminAccount FROM admin WHERE secret = ?', [$secret], false);

        return $req;
    }

    static function getAdminFromSecret($secret)
    {
        global $db;

        $req = $db->fetch('SELECT * FROM admin WHERE secret = ?', [$secret], false);

        return $req;
    }

    static function getAdminFromEmail($email)
    {
        global $db;

        $req = $db->fetch('SELECT * FROM admin WHERE email = ?', [$email], false);

        return $req;
    }
}