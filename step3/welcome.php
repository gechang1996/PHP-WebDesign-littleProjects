<?php
require 'format.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="mycss.css" type="text/css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
    <?php echo present_header("Stalking the Wumpus"); ?>
    <article>
        <div id="pic1">
            <figure><img src="cave-wumpus.jpg" width="600" height="325" alt="cave"/>
                <h2>Welcome to <em>Stalking the Wumpus</em></h2>
                <div id="link2">
                <p><a href="instructions.php">Instructions</a></p>
                <p><a href="game.php">Start Game</a></p>
                </div>
            </figure>
        </div>
    </article>

</body>
</html>