<?php
    //PDO: PHP Data Objects
    function getDB(){
      return new PDO('mysql:host=localhost;dbname=instrumagasin;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }



?>
