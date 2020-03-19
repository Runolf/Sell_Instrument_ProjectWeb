<?php
if(empty($_SESSION['mail'])){
    $title="Welcome";
}else{
    $title="Welcome " . $_SESSION['mail'] . " " . $_SESSION['pswd'];
}
$content="Welcome";
include 'includes/template.php';
?>
