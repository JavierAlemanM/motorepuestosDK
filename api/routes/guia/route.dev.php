<?php
    require 'controllers/private/controller.categories.php';
    require 'controllers/private/controller.products.php';
    require 'controllers/private/controller.brands.php';
    require 'controllers/private/controller.usersapp.php';
    require 'controllers/private/controller.usersadmin.php';

    // PRIVATE CATEGORIES
    $Api->Route('POST', 'private/categories/create', function() {
        categories_create();
    });

    $Api->Route('POST', 'private/categories/truncate', function() {
        categories_truncate();
    });

    $Api->Route('POST', 'private/categories/drop', function() {
        categories_drop();
    });

    // PRIVATE PRODUCTS
    $Api->Route('POST', 'private/products/create', function() {
        products_create();
    });

    $Api->Route('POST', 'private/products/truncate', function() {
        products_truncate();
    });

    $Api->Route('POST', 'private/products/drop', function() {
        products_drop();
    });

    // PRIVATE BRANDS
    $Api->Route('POST', 'private/brands/create', function() {
        brands_create();
    });

    $Api->Route('POST', 'private/brands/truncate', function() {
        brands_truncate();
    });

    $Api->Route('POST', 'private/brands/drop', function() {
        brands_drop();
    });

    // PRIVATE USERSAPP
    $Api->Route('POST', 'private/usersapp/create', function() {
        usersapp_create();
    });

    $Api->Route('POST', 'private/usersapp/truncate', function() {
        usersapp_truncate();
    });

    $Api->Route('POST', 'private/usersapp/drop', function() {
        usersapp_drop();
    });

    // PRIVATE USERSADMIN
    $Api->Route('POST', 'private/usersprivate/create', function() {
        usersadmin_create();
    });

    $Api->Route('POST', 'private/usersprivate/truncate', function() {
        usersadmin_truncate();
    });

    $Api->Route('POST', 'private/usersprivate/drop', function() {
        usersadmin_drop();
    });

?>