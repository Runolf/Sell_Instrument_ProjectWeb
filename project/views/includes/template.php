<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/bootstrap.min.css">
      <!--  <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/sticky-footer-navbar.css"> -->
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/ownstyle.css">
        <script src="<?=ROOT_PATH?>public/js/jquery-3.0.0.js"></script>
      <!--
        <script src="<?=ROOT_PATH?>public/js/jquery-3.4.1.slim.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/popper.min.js"></script>
      -->
        <script src="<?=ROOT_PATH?>public/js/bootstrap.min.js"></script>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="<?=ROOT_PATH?>article">L'instruMagasin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="<?=ROOT_PATH?>article">Les articles</a></li>
                    <?php
                      if(empty($_SESSION['mail']) && empty($_SESSION['pswd'])) {
                        echo '<li class="nav-item"><a class="nav-link" href='.ROOT_PATH.'signup>Signup</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href='.ROOT_PATH.'login>Login</a></li>';
                      }else{
                        if ($_SESSION['RoleId'] == 1) {
                          echo '<li class="nav-item"><a class="nav-link" href='.ROOT_PATH.'admin>ADMIN</a></li>';
                        }else {
                          echo '<li class="nav-item"><a class="nav-link" href='.ROOT_PATH.'sell>Selling</a></li>';
                          echo '<li class="nav-item"><a class="nav-link" href='.ROOT_PATH.'myArticles>My articles</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href='.ROOT_PATH.'cart>My cart</a></li>';
                        }
                        echo '<li class="nav-item"><a class="nav-link" href='.ROOT_PATH.'account>Account</a></li>';
                        echo '<a class="logout btn btn-outline-success my-2 my-sm-0" href="logout.php">logout</a>';
                      }
                     ?>
                </ul>
            </div>
        </nav>
        <main role="main" class="container">
          <?php
          if(!empty($errorMessage)){
              include('error.php');
          }
          if(!empty($msg)){
            include('msg.php');
          }
          ?>
            <h1 class="text-white"><?php echo $title; ?></h1>
            <?php echo $content; ?>
        </main>
        <footer class="footer text-white">
            <div class="container">
                <span>L'instruMagasin</span>
            </div>
        </footer>
    </body>
</html>
