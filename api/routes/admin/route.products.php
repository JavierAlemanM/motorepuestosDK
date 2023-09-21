<?php
    require 'controllers/admin/controller.products.php';

    $Api->Route('POST', 'admin/products/create/single', function() {
        products_create_single();
    });

    $Api->Route('POST', 'admin/products/create/masive', function() {
        products_create_masive();
    });
    /*
    $Api->Route('POST', 'admin/products/truncate', function() {
        products_truncate();
    });
    $Api->Route('POST', 'admin/products/drop', function() {
        products_drop();
    });
    */
?>