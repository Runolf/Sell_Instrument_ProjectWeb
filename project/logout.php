<?php
session_start();
session_unset(); //$_SESSION = [];
session_destroy();
header('Location: article'); // a besoin de passer par un controller et pas par une view 
?>
