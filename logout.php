<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header ('refresh:0; login.php');
?>