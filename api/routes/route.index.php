<?php
    require 'controllers/controller.index.php';
    $Api->Route('GET', '/', function() {
        index();
    });
    $Api->Route('POST', '/', function() {
        index();
    });
?>