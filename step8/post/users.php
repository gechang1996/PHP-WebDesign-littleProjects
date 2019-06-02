<?php
require '../lib/site.inc.php';

//var_dump($_POST);

$controller = new Felis\UsersController($site, $user, $_POST);
header("location: " . $controller->getRedirect());