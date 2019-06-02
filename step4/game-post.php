<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 5/28/2018
 * Time: 12:23 PM
 */
require 'lib/game.inc.php';
$controller = new Wumpus\WumpusController($wumpus, $_GET);
if($controller->Cheat()){
    $_SESSION[WUMPUS_SESSION] = new Wumpus\Wumpus(1422668587);
}
if($controller->isReset()) {
    unset($_SESSION[WUMPUS_SESSION]);
}


//$page = $controller->getPage();
//echo "<a href=\"$page\">$page</a>";
header('Location: ' . $controller->getPage());
