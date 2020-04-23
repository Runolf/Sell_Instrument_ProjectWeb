<?php
// je ne déclare pas "require 'connectionDB.php'" car il existe déjà dans "require 'users.php'";
require_once 'connectionDB.php';
require_once 'users.php';

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
     $this->$name = str_replace($data["name"], " ","_");
     $this->$brand = $data["brand"];
     $this->$picture = $data["picture"];
     $this->$price = $data["price"];
     $this->$comment = $data["comment"];
   }
}

public static function getAll(){
    global $DB;
    try{
      $response = $DB->query('SELECT * FROM articles');
      $response->setFetchMode(PDO::FETCH_CLASS, 'Article');
      $datas = $response->fetchAll();
      $response->closeCursor();
      return $datas;
    }
    catch(Exception $e){
      die('Erreur : ' . $e->getMessage());
    }

  }

 public static function getById($id){
      global $DB;
      try {
        $response = $DB->query('SELECT * FROM articles WHERE articleId = '. $id);
        $response->setFetchMode(PDO::FETCH_CLASS, 'Article');
        $data = $response->fetch();
        $response->closeCursor();
        return $data;

      } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }
  }

  public static function getUser($_idUser){
    global $DB;
    try {
      $response = $DB->query('
      SELECT u.userId, u.email , u.pseudo, u.pswd ,u.city, u.street, u.number, u.rating, u.RoleId
      FROM users AS u
      JOIN sellarticles AS sa
      ON u.userId = sa.userId
      WHERE sa.userId =
      '.$_idUser .' LIMIT 1');

      $response->setFetchMode(PDO::FETCH_CLASS, 'Article');
      $data = $response->fetchAll();
      $response->closeCursor();
      return $data;

    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
  }

  public static function post($id, $_name , $_brand , $_picture, $_price, $_comment){
    global $DB;
    try {
      $response = $DB->prepare('INSERT INTO `articles` SET name = :name , brand = :brand,
        picture = :picture, price = :price , comment = :comment');

      $response->setFetchMode(PDO::FETCH_CLASS, 'Article');

      $response->execute([':name' => $_name, ':brand' => $_brand,
      ':picture' => $_picture , ':price' => $_price, ':comment' => $_comment]);

      $InsertedId = $DB->lastInsertId();
      // ici je récupère la dernière valeur de la table article, qui est donc censé être l'article qui vient d'être insérer
      $IdUser =  $_SESSION["userId"];

      $resp = $DB->prepare("INSERT INTO sellarticles(articleId, userId) VALUES (:idArticle, :idUser)");
      $resp->setFetchMode(PDO::FETCH_CLASS, 'Article');
      $resp->execute([':idArticle' => $InsertedId, ':idUser' => $IdUser]);

      $resp->closeCursor();
      $response->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

  }

  public static function modify($id, $_name , $_brand , $_picture, $_price, $_comment){
    global $DB;
      try{
        $response = $DB->prepare("UPDATE articles SET
                                  \'name\' = :name ,
                                  brand = :brand,
                                  picture = :picture,
                                  price = :price ,
                                  \'comment\' = :comment
                                  where articleId = :id");


        $response->setFetchMode(PDO::FETCH_CLASS, 'Article');

        $response->execute([
                            ':name'    => $_name,
                            ':brand'   => $_brand,
                            ':picture' => $_picture ,
                            ':price'   => $_price,
                            ':comment' => $_comment,
                            ':id'      => $id
                          ]);



        $response->closeCursor();
      }catch (Exception $e) {
          die('Erreur : ' . $e->getMessage());
      }


  }

  public static function delete($id){
    global $DB;

    try {

      $deleteCart = $DB->query('DELETE FROM carts WHERE articleId = '. $id);
      $deleteSell = $DB->query('DELETE FROM sellarticles WHERE articleId = '. $id);
      $response = $DB->query('DELETE FROM articles WHERE articleId = '. $id);

      $response->setFetchMode(PDO::FETCH_CLASS, 'Article');

      $response->closeCursor();
      $deleteSell->closeCursor();
      $deleteCart->closeCursor();

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

  }

}
?>
