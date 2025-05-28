<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('notifications', function () {
    return true; // Cualquier usuario puede escuchar este canal
});
