<?php
require '../lib/site.inc.php';
//var_dump($_POST);
//var_dump($_GET);
$controller = new Felis\UserController($site, $user, $_POST,$_GET);
header("location: " . $controller->getRedirect());