<?php
    $listRoutes = array(
        'index', 
        'dev',
        'category',
        'products'
    );
    foreach($listRoutes as $route) {require 'route.'.$route.'.php';}
?>