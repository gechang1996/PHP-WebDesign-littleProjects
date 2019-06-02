<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 5/21/2018
 * Time: 11:07 PM
 */function present_header($title) {
    $html = <<<HTML
<header>
<nav><p><a href="welcome.php">New Game</a>
<a href="game.php">Game</a>
<a href="instructions.php">Instructions</a></p></nav>
<h1>$title</h1>
</header>
HTML;

    return $html;
}
