<?php
require 'lib/site.inc.php';
$view = new Felis\deletecaseView($site,$_GET);
if(!$view->protect($site, $user)) {
    header("location: " . $view->getProtectRedirect());
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="case">
    <?php echo $view->header(); ?>

    <?php echo $view->presentForm(); ?>

    <?php echo $view->footer(); ?>

</div>

</body>
</html>
