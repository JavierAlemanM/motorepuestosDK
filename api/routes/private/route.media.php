<?php
    require 'controllers/private/controller.media.php';
    $Api->Route('POST', 'private/media/create', function() {
        media_create();
    });
    $Api->Route('POST', 'private/media/truncate', function() {
        media_truncate();
    });
    $Api->Route('POST', 'private/media/drop', function() {
        media_drop();
    });
?>