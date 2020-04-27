<?php
    require_once 'models/articles.php';
    require_once 'models/users.php';
    require_once 'models/sellarticles.php';

    if (!REQ_ACTION) {

      if (!REQ_TYPE_ID){
        $articles = Article::getAllActives(); // accès aux methodes static. pas de -> ou de .
        include 'views/articles.php';
      }else{

        $dude = User::getUserByHisArticle(REQ_TYPE_ID);
        $state = SellArticle::getOne(REQ_TYPE_ID);
        $article = Article::getById(REQ_TYPE_ID);
        include 'views/article.php';
      }

    }

    if (REQ_ACTION == "delete") {
      Article::delete(REQ_TYPE_ID);
      include 'views/myArticles.php';
      header("Location: myArticles");
      exit();
    }

 ?>
