<?php
    require 'controllers/private/controller.company.php';
    $Api->Route('POST', 'private/company_direction/create', function() {
        company_direction_create();
    });
    $Api->Route('POST', 'private/company_direction/truncate', function() {
        company_direction_truncate();
    });
    $Api->Route('POST', 'private/company_direction/drop', function() {
        company_direction_drop();
    });

    $Api->Route('POST', 'private/company_phone/create', function() {
        company_phone_create();
    });
    $Api->Route('POST', 'private/company_phone/truncate', function() {
        company_phone_truncate();
    });
    $Api->Route('POST', 'private/company_phone/drop', function() {
        company_phone_drop();
    });

    $Api->Route('POST', 'private/company_social/create', function() {
        company_social_create();
    });
    $Api->Route('POST', 'private/company_social/truncate', function() {
        company_social_truncate();
    });
    $Api->Route('POST', 'private/company_social/drop', function() {
        company_social_drop();
    });
?>