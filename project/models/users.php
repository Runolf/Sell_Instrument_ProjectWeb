<?php
require 'connectionDB.php';

class User{
  public $useId;
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
      $this->$useId = $data["useId"];
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
    $response = getDB()->query('SELECT * FROM users');
    $response->setFetchMode(PDO::FETCH_CLASS, 'User');
    $datas = $response->fetchAll();
    $response->closeCursor();
    return $datas;
  }

  public static function getById($id){
       $response = getDB()->query('SELECT * FROM users WHERE userId = '. $id);
       $response->setFetchMode(PDO::FETCH_CLASS, 'User');
       $data = $response->fetch();
       $response->closeCursor();
       return $data;
   }

  public static function post($_mail, $_pseudo, $_pswd, $_city, $_street, $_nbr){ //mail, pseudo, city , street, nbr, pswd, confirm_password
    $response = getDB()->prepare('INSERT INTO `users` SET email = :email, pseudo = :pseudo,
      pswd = :pswd,  city = :city, street = :street,  number = :nbr');

    $response->setFetchMode(PDO::FETCH_CLASS, 'User');

    // password_hash($_POST['pswd'], PASSWORD_DEFAULT)
    $response->execute([':email' => $_mail, ':pseudo' => $_pseudo,
    ':pswd' => $_pswd, ':city' => $_city,
    ':street' => $_street, ':nbr' => $_nbr]);

    $response->closeCursor();
  }


  public static function modify($id){

  }


  public static function isUserExists($login){
    // verifie si l'user existe
    $response = getDB()->query('SELECT * FROM users WHERE email = :login');
    $response->setFetchMode(PDO::FETCH_CLASS, 'User');
    $response->execute([':login' => $login]);
    $data = $response->fetch();
    $response->closeCursor();
    return $data;
  }


}

 ?>
