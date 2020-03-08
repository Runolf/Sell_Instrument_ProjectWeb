<?php
  try
  {
      //PDO: PHP Data Objects
      $bdd = new PDO('mysql:host=localhost;dbname=instrumagasin;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  catch (Exception $e)
  {
      //die — Alias de la fonction exit qui affiche un message et termine le script courant
      die('Erreur : ' . $e->getMessage());
  }
?>
