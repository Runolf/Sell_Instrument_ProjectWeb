<?php
// je ne déclare pas "require 'connectionDB.php'" car il existe déjà dans "require 'users.php'";
require 'users.php';

 class Article{
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

  public static function post($id, $_name , $_brand , $_picture, $_price, $_comment){
    $response = getDB()->prepare('INSERT INTO `articles` SET name = :name , brand = :brand,
      picture = :picture, price = :price , comment = :comment');

    $response->setFetchMode(PDO::FETCH_CLASS, 'Article');

    $response->execute([':name' => $_name, ':brand' => $_brand,
    ':picture' => $_picture , ':price' => $_price, ':comment' => $_comment]);

    $InsertedId = getDB()->query('SELECT MAX(articleId) FROM articles');
    // ici je récupère la dernière valeur de la table article, qui est donc censé être l'article qui vient d'être insérer
    $IdUser =  $_SESSION["userId"];

    $resp = getDB()->prepare("INSERT INTO sellarticles(articleId, userId) VALUES (:idArticle, :idUser)");
    $resp->setFetchMode(PDO::FETCH_CLASS, 'Article');
    $resp->execute([':idArticle' => $InsertedId, ':idUser' => $IdUser]);
    //ici ensuite je suis sensé faire l'insertion dans la table intermédaire qui est le shopping cart

    // probablement encore du code ici mais pas encore réfléchi à ça

    $resp->closeCursor();
    $response->closeCursor();
  }

  public static function modify($id, $_name , $_brand , $_picture, $_price, $_comment){
    $response = getDB()->prepare('UPDATE `articles` SET name = :name , brand = :brand,
      picture = :picture, price = :price , comment = :comment WHERE articleId = '.$id);
    $response->setFetchMode(PDO::FETCH_CLASS, 'Article');
    $response->execute([':name' => $_name, ':brand' => $_brand,
    ':picture' => $_picture , ':price' => $_price, ':comment' => $_comment]);

    $response->closeCursor();
  }

  public static function delete($id){
    $response = getDB()->query('DELETE FROM articles WHERE articleId = '. $id);
    $response->setFetchMode(PDO::FETCH_CLASS, 'Article');
    $response->closeCursor();
  }

}
?>
