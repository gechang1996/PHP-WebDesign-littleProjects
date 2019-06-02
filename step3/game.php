<?php
require 'format.inc.php';
require 'wumpus.inc.php';
$room = 1; // The room we are in.
$shooting = 1;//This is the room that you want to shoot
$birds = 7;  // Room with the birds
$pits = array(3, 10, 13);    // Rooms with a bottomless pit
$wumpus = 14; //Room with wumpus
$arrows = 3; //number of arrows
$cave = cave_array(); // Get the cave

if (isset($_GET['a'])&& isset($cave[$_GET['a']])) {
    $shooting=$_GET['a'];
    if ($shooting==$wumpus){
        header("Location: win.php");
        exit;
    }
}

if(isset($_GET['r'])&& isset($cave[$_GET['r']])) {
    // We have been passed a room number
    $room = $_GET['r'];
    if ($room==$birds){
        $room=10;
    }
    if (in_array($room,$pits)){
        header("Location: lose.php");
        exit;
    }
    if ( $room == $wumpus){
        header("Location: lose.php");
        exit;
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="mycss.css" type="text/css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>game</title>
</head>
<body>
<?php echo present_header("Stalking the Wumpus"); ?>
<article>
    <div id="pic1">
    <figure><img src="cave.jpg" width="600" height="325" alt="cave"/>
        <?php
        echo '<p>' . date("g:ia l, F j, Y") . '</p>';
        ?>
        <h2>You are in room <?php echo $room; ?></h2>
        <?php
            if (($cave[$room][0]==$birds) || ($cave[$room][1]==$birds) || ($cave[$room][2]==$birds))
            {
                echo "<p>You hear birds!</p>";
            }
            else
                {
                 echo  "<p>&nbsp;</p>";
                }
            if (in_array($cave[$room][0],$pits) || in_array($cave[$room][1],$pits) || in_array($cave[$room][2],$pits))
            {
                echo "<p>You feel a draft!</p>";
            }
            else
            {
                 echo  "<p>&nbsp;</p>";
            }
            $result=false;
            if (($cave[$room][0]==$wumpus)||($cave[$room][1]==$wumpus) || ($cave[$room][2]==$wumpus)){
                $result=true;
            }

            for ($i=0;$i<=2;$i++)
                {
                    $number1=$cave[$room][$i];
                    if (($cave[$number1][0]==$wumpus) ||($cave[$number1][1]==$wumpus) || ($cave[$number1][2]==$wumpus))
                    {
                        $result=true;
                    }
                }

            if ($result==true)
            {
                echo "<p>You smell a wumpus!</p>";
            }
            else
            {
                echo  "<p>&nbsp;</p>";
            }


        ?>


    </figure>
    </div>
    <div id="pic2">
        <div id="link1">
        <figure>
            <div class="my_pic2">
                <img src="cave2.jpg" width="180" height="135" alt="cave2"/>
                <p><a href="game.php?r=<?php echo $cave[$room][0]; ?>"><?php echo $cave[$room][0]; ?></a></p><p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][0]; ?>">Shoot Arrow</a></p>
            </div>
            <div class="my_pic2">
                <img src="cave2.jpg" width="180" height="135" alt="cave2"/>
                <p><a href="game.php?r=<?php echo $cave[$room][1]; ?>"><?php echo $cave[$room][1]; ?></a></p><p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][1]; ?>">Shoot Arrow</a></p>
            </div>
            <div class="my_pic2">
                <img src="cave2.jpg" width="180" height="135" alt="cave2"/>
                <p><a href="game.php?r=<?php echo $cave[$room][2]; ?>"><?php echo $cave[$room][2]; ?></a></p><p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][2]; ?>">Shoot Arrow</a></p>
            </div>
        </figure>
        </div>
    </div>
    <div id="last">
    <p>You have 3 arrows remaining.</p>
    </div>
</article>
</body>
</html>