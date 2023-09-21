<?php
    require 'controllers/private/controller.usersapp.php';

    $Api->Route('POST', 'private/usersapp/create', function() {
        usersapp_create();
    });
    $Api->Route('POST', 'private/usersapp/truncate', function() {
        usersapp_truncate();
    });
    $Api->Route('POST', 'private/usersapp/drop', function() {
        usersapp_drop();
    });

    $Api->Route('POST', 'private/usersapp_direction/create', function() {
        usersapp_direction_create();
    });
    $Api->Route('POST', 'private/usersapp_direction/truncate', function() {
        usersapp_direction_truncate();
    });
    $Api->Route('POST', 'private/usersapp_direction/drop', function() {
        usersapp_direction_drop();
    });


    $Api->Route('POST', 'private/usersapp_motorbike/create', function() {
        usersapp_motorbike_create();
    });
    $Api->Route('POST', 'private/usersapp_motorbike/truncate', function() {
        usersapp_motorbike_truncate();
    });
    $Api->Route('POST', 'private/usersapp_motorbike/drop', function() {
        usersapp_motorbike_drop();
    });


    $Api->Route('POST', 'private/usersapp_history/create', function() {
        usersapp_history_create();
    });
    $Api->Route('POST', 'private/usersapp_history/truncate', function() {
        usersapp_history_truncate();
    });
    $Api->Route('POST', 'private/usersapp_history/drop', function() {
        usersapp_history_drop();
    });

?>