<?php
    session_start();     
    $listRoutes = array(
        'prueba',
        'index',
        'perfil',
        'login',
        'admin',
        'contacto',
        'carrito',
        'nosotros',
        'producto',
        'productos',
        'admin'
    );
    foreach($listRoutes as $route) {
        require 'route.'.$route.'.php';
    }
?>
