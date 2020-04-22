<?php
  require_once 'connectionDB.php';

  class SellArticles{

    public $sellArticleId;
    public $articleId;
    public $userId;

    public function __construct($data=null){
      if (is_array($data)) {
        $this->$sellArticleId = $data["sellArticleId"];
        $this->$articleId = $data["articleId"];
        $this->$userId = $data["userId"];
      }
   }

   // pas de post ici car il se trouve dans le post du modele article

   public static function delete(){


   }

  }
?>
