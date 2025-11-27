<?php

use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return dockerHealthResponse();
});

// All other routes have been removed as part of the Vue to Blade migration
// Blade views are now available in resources/views/extracted/
