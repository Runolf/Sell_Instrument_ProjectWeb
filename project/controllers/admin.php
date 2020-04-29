<?php
  require_once 'models/users.php';

    if(empty($_SESSION['mail'])){
        header("Location: article");
        exit();
    }

    global $DB;
    $sql = "SELECT COUNT(articleId) AS nbrArticles , userId AS dude FROM sellarticles GROUP BY userId";
    $stmt = $DB->prepare($sql);
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

    /*
    echo '<pre>';
    echo print_r($arr);
    */
    include 'views/admin.php';

 ?>
