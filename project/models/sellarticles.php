<?php
  require_once 'connectionDB.php';

  class SellArticle{

    public $sellArticleId;
    public $articleId;
    public $userId;
    public $active;

    public function __construct($data=null){
      if (is_array($data)) {
        $this->$sellArticleId = $data["sellArticleId"];
        $this->$articleId = $data["articleId"];
        $this->$userId = $data["userId"];
        $this->$active = $data["active"];
      }
   }

   public static function getOne($_IdArticle){
     global $DB;
     try {
       $response = $DB->query('SELECT * FROM sellarticles WHERE articleId = '. $_IdArticle);
       $response->setFetchMode(PDO::FETCH_CLASS, 'SellArticle');
       $data = $response->fetch();
       $response->closeCursor();
       return $data;

     } catch (Exception $e) {
       die('Erreur : ' . $e->getMessage());
     }
   }

   // pas de post ici car il se trouve dans le post du modele article

   public static function delete($_IdArticle){
     global $DB;

     try {
       $response = $DB->query('UPDATE sellarticles SET active = 0 WHERE articleId ='.$_IdArticle);

       $response->setFetchMode(PDO::FETCH_CLASS, 'SellArticle');

       $response->closeCursor();
     } catch (Exception $e) {
         die('Erreur : ' . $e->getMessage());
     }
   }

  }
?>
