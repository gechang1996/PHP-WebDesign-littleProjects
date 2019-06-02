<?php
require 'lib/game.inc.php';
$view = new Wumpus\WumpusView($wumpus);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="mycss.css" type="text/css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>Stalking the Wumpus</title>
</head>
<body>
<header>
    <nav>
    <div id="page_top">
        <p><a href="welcome.php">New Game</a>&nbsp;<a href="game.php">Game</a>&nbsp;<a href="instructions.php">Instruction</a></p>
    </div>
    </nav>
    <h1>Stalking the Wumpus</h1>
</header>
<article>
    <div id="pic1">
    <figure><img src="cave.jpg" width="600" height="325" alt="cave"/>
        <?php
        echo $view->presentStatus();
        ?>
    </figure>
    </div>
    <div id="pic2">
        <div id="link1">
        <figure>
            <?php
            echo $view->presentRoom(0);
            echo $view->presentRoom(1);
            echo $view->presentRoom(2);
            ?>
        </figure>
        </div>
    </div>
    <div id="last">
        <?php echo $view->presentArrows(); ?>
    </div>
</article>
</body>
</html>