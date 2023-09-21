<?php
    require 'controllers/private/controller.products.php';
    $Api->Route('POST', 'private/products/create', function() {
        products_create();
    });
    $Api->Route('POST', 'private/products/truncate', function() {
        products_truncate();
    });
    $Api->Route('POST', 'private/products/drop', function() {
        products_drop();
    });
?>