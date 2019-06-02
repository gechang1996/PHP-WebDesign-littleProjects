<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 5/30/2018
 * Time: 1:03 AM
 */
require __DIR__ . "/../vendor/autoload.php";
session_start();

define('GUESSING_SESSION','guessing');


if(!isset($_SESSION[GUESSING_SESSION])) {
    $_SESSION[GUESSING_SESSION] = new Guessing\Guessing();
}
if(isset($_GET['seed'])) {
    $_SESSION[GUESSING_SESSION] = new Guessing\Guessing(strip_tags($_GET['seed']));
}


$guessing = $_SESSION[GUESSING_SESSION];