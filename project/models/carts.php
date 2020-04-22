<?php
require_once 'connectionDB.php';
require_once 'articles.php';

class Cart{
  public $cartId;
  public $articleId;
  public $userId;

  public function __construct($data=null){
    if(is_array($data)){
      $this->$cartId = $data["cartId"];
      $this->$articleId = $data["articleId"];
      $this->$userId = $data["userId"];
    }
  }

  public static function getAll(){
    global $DB;
    try {
      $response = $DB->query('SELECT * FROM carts');
      $response->setFetchMode(PDO::FETCH_CLASS, 'Cart');
      $datas = $response->fetchAll();
      $response->closeCursor();

      return $datas;
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
  }

  public static function getById($id){
       global $DB;
       try {
         $response = $DB->query('SELECT * FROM carts WHERE cartId = '. $id);
         $response->setFetchMode(PDO::FETCH_CLASS, 'Cart');
         $data = $response->fetch();
         $response->closeCursor();
         return $data;

       } catch (Exception $e) {
         die('Erreur : ' . $e->getMessage());
       }
   }

   public static function getCartClient($idUser){
     global $DB;
     try {
       //$response = $DB->query('SELECT * FROM carts WHERE userId = '.$idUser);

       $response = $DB->query('
       SELECT A.articleId, A.name, A.brand, A.picture, A.price, A.comment
      FROM carts AS C
      JOIN articles AS A
      ON C.articleId = A.articleId
      WHERE userId =
       ' .$idUser);

       $response->setFetchMode(PDO::FETCH_CLASS, 'Cart');
       $datas = $response->fetchAll();
       $response->closeCursor();

       return $datas;
     } catch (Exception $e) {
       die('Erreur : ' . $e->getMessage());
     }
   }

   public static function addToCart($_IdArticle, $_IdUser){
     global $DB;
     try {

       $response = $DB->prepare('INSERT INTO carts (articleId, userId) VALUES (:idArticle , :idUser)');
       $response->setFetchMode(PDO::FETCH_CLASS, 'User');

       $response->execute([':idArticle' => $_IdArticle,
                           ':idUser'    => $_IdUser]);

       $response->closeCursor();

     } catch (Exception $e) {
       die('Erreur : ' . $e->getMessage());
     }

   }

   // pas de modify car cela n'a pas de sens de modifier une commande dans ce cas ci.


  public static function delete($id){
    global $DB;

    try {
       $DB->query('DELETE FROM carts WHERE cartId = '.$id);

      $response->setFetchMode(PDO::FETCH_CLASS, 'Cart');

      $response->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
  }
}
?>
