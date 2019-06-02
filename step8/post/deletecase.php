<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/12/2018
 * Time: 7:40 PM
 */

require '../lib/site.inc.php';

$controller = new Felis\deletecaseController($site, $_POST,$_GET);
header("location: " . $controller->getRedirect());

