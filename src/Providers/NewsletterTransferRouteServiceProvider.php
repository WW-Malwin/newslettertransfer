<?php

namespace NewsletterTransfer\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

class NewsletterTransferRouteServiceProvider extends RouteServiceProvider
{
    public function map(Router $router)
    {
        $router->get('newsletter-transfer/config', 'NewsletterTransfer\Controllers\ConfigController@showConfig');
        $router->post('newsletter-transfer/config', 'NewsletterTransfer\Controllers\ConfigController@saveConfig');
        $router->get('transfer-newsletter', 'NewsletterTransfer\Controllers\NewsletterTransferController@transfer');
        $router->get('transfer-newsletter/manual', 'NewsletterTransfer\Controllers\NewsletterTransferController@manualTransfer');
    }
}
