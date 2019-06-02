<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/12/2018
 * Time: 7:40 PM
 */

require '../lib/site.inc.php';

$controller = new Felis\CasesController($site, $_POST);
header("location: " . $controller->getRedirect());


