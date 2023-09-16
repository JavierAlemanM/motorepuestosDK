<?php
    require 'controllers/controller.category.php';
    $Api->Route('GET', 'category', function() {
        getCategories();
    });

?>