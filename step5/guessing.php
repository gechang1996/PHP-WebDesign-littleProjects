<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 5/29/2018
 * Time: 11:34 PM
 */
require __DIR__ . '/lib/guessing.inc.php';
$view = new Guessing\GuessingView($guessing);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link href="mycss.css" type="text/css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>Guessing Game</title>
</head>
<body>
<?php echo $view->present(); ?>
</body>
</html>
