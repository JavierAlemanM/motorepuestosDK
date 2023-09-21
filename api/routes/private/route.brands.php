<?php
    require 'controllers/private/controller.brands.php';
    $Api->Route('POST', 'private/brands/create', function() {
        brands_create();
    });
    $Api->Route('POST', 'private/brands/truncate', function() {
        brands_truncate();
    });
    $Api->Route('POST', 'private/brands/drop', function() {
        brands_drop();
    });
?>