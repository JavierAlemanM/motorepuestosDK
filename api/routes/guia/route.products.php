<?php
    require 'controllers/controller.products.php';
    $Api->Route('GET', 'products', function(){
        switch ($_GET['filter']) {
            case 'all':
                products_all($_GET['pageNum'],20);
                break;
            case 'product':
                products_products($_GET['product'], $_GET['pageNum'],20);
                break;
            case 'category':
                products_categories($_GET['category'], $_GET['pageNum'],20);
                break;
        }
    });
?>