<?php
    require 'controllers/private/controller.categories.php';
    $Api->Route('POST', 'private/categories/create', function() {
        categories_create();
    });
    $Api->Route('POST', 'private/categories/truncate', function() {
        categories_truncate();
    });
    $Api->Route('POST', 'private/categories/drop', function() {
        categories_drop();
    });
?>