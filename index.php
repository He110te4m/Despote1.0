<?php
    require 'view/head.php';
    require 'core/rotate.php';
    $url = \core\Rotate::getAddr();
    // echo $url;
    if (!$url) {
        include 'view/home.php';
    } else {
        include "view/$url.php";
    }
    require 'view/foot.php';
?>
