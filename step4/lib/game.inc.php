<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 5/27/2018
 * Time: 8:43 PM
 */
require __DIR__ . "/../vendor/autoload.php";
// Start the PHP session system
session_start();
define("WUMPUS_SESSION", 'wumpus');

// If there is a Wumpus session, use that. Otherwise, create one
if(!isset($_SESSION[WUMPUS_SESSION])) {
    $_SESSION[WUMPUS_SESSION] = new Wumpus\Wumpus();
    //$_SESSION[WUMPUS_SESSION] = new Wumpus\Wumpus(1422668587);   // Seed: 1422668587
}

$wumpus = $_SESSION[WUMPUS_SESSION];
