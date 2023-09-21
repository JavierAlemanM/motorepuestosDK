<?php
    require 'controllers/private/controller.usersadmin.php';
    $Api->Route('POST', 'private/usersadmin/create', function() {
        usersadmin_create();
    });
    $Api->Route('POST', 'private/usersadmin/truncate', function() {
        usersadmin_truncate();
    });
    $Api->Route('POST', 'private/usersadmin/drop', function() {
        usersadmin_drop();
    });
?>