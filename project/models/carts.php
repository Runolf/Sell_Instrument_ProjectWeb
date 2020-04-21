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
      $response = $DB->query('SELECT * FROM users');
      $response->setFetchMode(PDO::FETCH_CLASS, 'User');
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
         $response = $DB->query('SELECT * FROM users WHERE userId = '. $id);
         $response->setFetchMode(PDO::FETCH_CLASS, 'User');
         $data = $response->fetch();
         $response->closeCursor();
         return $data;

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
   
  public static function modify($id , $_mail, $_pseudo, $_pswd, $_city, $_street, $_nbr){
                            // UPDATE `users` SET rating = 50, RoleId = 2 WHERE userId = 7;
    global $DB;

    try {
      $response = $DB->prepare('UPDATE `users` SET email = :email, pseudo = :pseudo,
        pswd = :pswd,  city = :city, street = :street,  number = :nbr WHERE userId ='.$id);

      $response->setFetchMode(PDO::FETCH_CLASS, 'User');

      if ($_pswd == $_SESSION['pswd']) {
        $response->execute([':email' => $_mail, ':pseudo' => $_pseudo,
        ':pswd' => $_SESSION['pswd'] , ':city' => $_city,
        ':street' => $_street, ':nbr' => $_nbr]);
      }
      else {
        $response->execute([':email' => $_mail, ':pseudo' => $_pseudo,
        ':pswd' => password_hash($_pswd, PASSWORD_DEFAULT), ':city' => $_city,
        ':street' => $_street, ':nbr' => $_nbr]);
      }


      $response->closeCursor();

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

  }

  public static function delete($id){
    global $DB;

    try {
      $deleteSellArticle = $DB->query('DELETE FROM sellarticles WHERE userId = '.$id);
      $response = $DB->query('DELETE FROM users WHERE userId = '. $id);

      $response->setFetchMode(PDO::FETCH_CLASS, 'User');

      $deleteSellArticle->closeCursor();
      $response->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
  }



  public static function getAllCart($idUser){

  }

}

 ?>
