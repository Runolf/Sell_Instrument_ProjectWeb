<?php
session_start();
session_unset(); //$_SESSION = [];
session_destroy();
header('Location: welcome'); // a besoin de passer par un controller et pas par une view 
?>
