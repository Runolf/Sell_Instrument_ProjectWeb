<?php
  require 'connectionDB.php';

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

   
  }
?>