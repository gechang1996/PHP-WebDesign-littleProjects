<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 5/30/2018
 * Time: 12:12 AM
 */

require __DIR__ . '/lib/guessing.inc.php';
$controller = new Guessing\GuessingController($guessing, $_POST);
if($controller->isReset()) {
    unset($_SESSION[GUESSING_SESSION]);
}
header("location: guessing.php");
exit;