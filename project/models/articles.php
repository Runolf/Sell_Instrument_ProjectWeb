<?php
require 'connectionDB.php';
 class Article{
  // La variable data est une liste contenant l'ensemble des données. 1 élément = 1 donnée.
  // A terme, les données seront récupérées depuis une db et injectées dans des objets php
  // $data = [
  //     ['nom' => 'Pomme',
  //     'prix' => 1.2,
  //     'description' => 'Granny-Smith',
  //     'origine' => 'Australie',
  //     ],
  //     ['nom' => 'Poire',
  //     'prix' => 1.25,
  //     'description' => 'Williams',
  //     'origine' => 'USA',
  //     ],
  //     ['nom' => 'Peche',
  //     'prix' => 0.95,
  //     'description' => 'Classique',
  //     'origine' => 'Italie',
  //     ],
  // ];
  //
  // // La fonction getArticles retourne l'ensemble des données.
  //   function getArticles() {
  //       global $data; // portée globale afin de disposer de la liste. Sans le mot clé global, la variable data sera locale et donc null
  //       return $data;
  //   }
 public $articleId;
 public $name;
 public $brand;
 public $picture;
 public $price;
 public $comment;

 public function __construct($data=null){
   if (is_array($data)) {
     $this->$articleId = $data["articleId"];
     $this->name = str_replace($data["name"], " ","_");
     $this->brand = $data["brand"];
     $this->$picture = $data["picture"];
     $this->$price = $data["price"];
     $this->$comment = $data["comment"];
   }
}

public static function getAll(){

    $response = getDB()->query('SELECT * FROM articles');
    $response->setFetchMode(PDO::FETCH_CLASS, 'Article');
    $datas = $response->fetchAll();
    $response->closeCursor();
    return $datas;

  }

 public static function getById($id){
      $response = getDB()->query('SELECT * FROM articles WHERE articleId = '. $id);
      $response->setFetchMode(PDO::FETCH_CLASS, 'Article');
      $data = $response->fetch();
      $response->closeCursor();
      return $data;
  }


}
?>
