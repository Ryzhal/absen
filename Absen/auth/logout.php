<?php

session_start();

session_unset();

$_SESSION = [];


require_once "../config.php";

header("location:login.php");
exit;


?>