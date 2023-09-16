<?php
    require 'controllers/controller.dev.php';

    $Api->Route('GET', 'dev/categories', function() {
        categories();
    });

    $Api->Route('GET', 'dev/products', function() {
        products();
    });

    $Api->Route('GET', 'dev/products/masive_insert', function() {
        products_masive_insert();
    });

    $Api->Route('GET', 'dev/brands', function() {
        brands();
    });

    $Api->Route('GET', 'dev/all', function() {
        all();
    });

?>