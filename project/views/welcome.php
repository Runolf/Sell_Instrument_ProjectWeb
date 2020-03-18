<?php
if(empty($_SESSION['mail'])){
    $title="Pas session";
}else{
    $title="Bienvenue " . $_SESSION['mail'] . " " . $_SESSION['pswd'];
}
$content="Welcome";
include 'includes/template.php';
?>
