<?php 

class Articles {

    public $id;
    public $title;
    public $sentence;
    public $content;
    public $date;
    public $author;
    public $category;

    /**
     * Author's consctructor
     * @param $id 
     */
    function __construct($id){
        
        global $db;

        $id = str_secure($id);

        $req = $db->fetch('
            SELECT a.*, au.firstname, au.lastname, c.name AS category
            FROM articles a 
            INNER JOIN authors au ON au.id = a.author_id 
            INNER JOIN categories c ON c.id = a.category_id 
            WHERE a.id = ?
        ', [$id], false);

        $data = $req;
        $this->id = $id;
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->sentence = $data['sentence'];
        $this->date = $data['date'];
        $this->author = $data['firstname'].''.$data['lastname'];
        $this->category = $data['category'];
    }

    /**
     * Envoie de tous les articles
     * @return array 
     */
    static function getAllArticles(){
        
        global $db;

        $req = $db->fetch('
            SELECT a.*, au.firstname, au.lastname, c.name AS category 
            FROM articles a
            INNER JOIN authors au ON au.id = a.author_id 
            INNER JOIN categories c ON c.id = a.category_id 
        ', [], true);

        return $req;
    }

    /**
     * Récupération du dernier article
     * @return array 
     */
    static function getLastArticle($category = null){

        global $db;

        if($category == null){
            $req = $db->fetch('
                SELECT a.*, au.firstname, au.lastname, c.name AS category 
                FROM articles a
                INNER JOIN authors au ON au.id = a.author_id 
                INNER JOIN categories c ON c.id = a.category_id 
                ORDER BY id DESC
                LIMIT 1
            ', [], false);
        } else {
            $req = $db->fetch('
                SELECT a.*, au.firstname, au.lastname, c.name AS category 
                FROM articles a
                INNER JOIN authors au ON au.id = a.author_id 
                INNER JOIN categories c ON c.id = a.category_id 
                WHERE c.id = ?
                ORDER BY id DESC
                LIMIT 1
            ', [str_secure($category)], false);
        }

        return $req;
    }
}