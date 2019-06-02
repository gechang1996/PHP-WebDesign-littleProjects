<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/12/2018
 * Time: 7:40 PM
 */

require '../lib/site.inc.php';
//var_dump($_GET);
//var_dump($_POST);
$controller = new Felis\CaseController($site, $_POST,$_GET);
header("location: " . $controller->getRedirect());



