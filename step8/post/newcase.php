<?php
require '../lib/site.inc.php';

//var_dump($user);
//var_dump($_POST);
$controller = new Felis\NewCaseController($site, $user, $_POST);

header("location: " . $controller->getRedirect());