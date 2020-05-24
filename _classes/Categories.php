<?php 

class Categories {
    public $id;
    public $name;

    /**
     * Categories consctructor
     * @param $id 
     */
    function __construct($id){
        global $db;

        $id = str_secure($id);

        $req = $db->fetch('SELECT * FROM categories WHERE id = ?', [$id], false);

        $data = $req;
        $this->id = $id;
        $this->name = $data['name'];

    }
    
    /**
     * Envoie de toutes les categories
     * @return array 
     */
    static function getAllCategories(){
        global $db;

        $req = $db->fetch('SELECT * FROM categories', [], true);

        return $req;
    }
}