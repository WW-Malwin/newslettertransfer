<?php

use NewsletterTransfer\Controllers\ConfigController;

Route::get('newsletter-transfer/config', [ConfigController::class, 'showConfig']);
Route::post('newsletter-transfer/config', [ConfigController::class, 'saveConfig']);
