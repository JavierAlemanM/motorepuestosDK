<?php
    require './core/core.php';
    $Api = new Api;
    require './routes/routes.php';
    $Api->render();
?>