<?php
    require 'view/head.php';
    require 'core/rotate.php';
    $url = \core\Rotate::getAddr();

    $url = !$url ? "view/home.php" : "view/$url.php";
    include $url;
    require 'view/foot.php';
?>
