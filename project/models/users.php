<?php
require_once 'connectionDB.php';
require_once 'articles.php';

class User{
  public $userId;
  public $email;
  public $pseudo;
  public $pswd;
  public $city;
  public $street;
  public $number;
  public $rating;
  public $RoleId;

  public function __construct($data=null){
    if(is_array($data)){
       $this->$userId = $data["userId"];
       $this->$email = $data["email"];
       $this->$pseudo = $data["pseudo"];
       $this->$pswd = $data["pswd"];
       $this->$city = $data["city"];
       $this->$street = $data["street"];
       $this->$number = $data["number"];
       $this->$rating = $data["rating"];
       $this->$RoleId = $data["RoleId"];
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

   public static function getArticles($idUser){

     global $DB;
     try {
       $response = $DB->query('SELECT a.articleId , a.name , a.brand , a.picture , a.price , a.comment
                               FROM articles AS a
                               INNER JOIN sellarticles AS s
                               ON a.articleId = s.articleId
                               WHERE s.userId = '.$idUser);

       $response->setFetchMode(PDO::FETCH_CLASS, 'User');
       $data = $response->fetchAll();
       $response->closeCursor();
       return $data;

     } catch (Exception $e) {
       die('Erreur : ' . $e->getMessage());
     }


   }

  public static function post($_mail, $_pseudo, $_pswd, $_city, $_street, $_nbr){ //mail, pseudo, city , street, nbr, pswd, confirm_password
    global $DB;
    try {
      $response = $DB->prepare('INSERT INTO `users` SET email = :email, pseudo = :pseudo,
        pswd = :pswd,  city = :city, street = :street,  number = :nbr, RoleId = 2, rating = 0');

      $response->setFetchMode(PDO::FETCH_CLASS, 'User');


      // password_hash($_POST['pswd'], PASSWORD_DEFAULT)
      $response->execute([':email' => $_mail, ':pseudo' => $_pseudo,
      ':pswd' => password_hash($_pswd, PASSWORD_DEFAULT), ':city' => $_city,
      ':street' => $_street, ':nbr' => $_nbr]);

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

  public static function isUserExists($email){

    global $DB;
    try {

          $response = $DB->prepare('SELECT * FROM `users` WHERE email = :email');

          $response->setFetchMode(PDO::FETCH_CLASS , 'User');

          $response->execute([':email' => $email]);
          $data = $response->fetch();
          $response->closeCursor();
          return $data;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

  }

}

 ?>
