<?php
require 'format.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="mycss.css" type="text/css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>win</title>
</head>
<body>
    <?php echo present_header("Stalking the Wumpus"); ?>
    <article>
        <div id="pic1">
            <figure><img src="dead-wumpus.jpg" width="600" height="325" alt="cave"/>
                <h3>You killed the Wumpus</h3>
                <div id="link2">
                    <p><a href="welcome.php">New Game</a></p>
                </div>
            </figure>
        </div>
    </article>
</body>
</html>