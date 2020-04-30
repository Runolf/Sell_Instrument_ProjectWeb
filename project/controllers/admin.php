<?php
  require_once 'models/users.php';

    if(empty($_SESSION['mail'])){
        header("Location: article");
        exit();
    }

    global $DB;
    $sql = "SELECT COUNT(sa.articleId) AS nbrArticles , u.pseudo AS dude FROM sellarticles AS sa JOIN `users` AS u ON sa.userId = u.userId GROUP BY dude;";
    $stmt = $DB->prepare($sql);
    $stmt->execute();
    $arr = $stmt->fetchAll();

    /*
    echo '<pre>';
    echo print_r($arr);
    */
    include 'views/admin.php';

 ?>
