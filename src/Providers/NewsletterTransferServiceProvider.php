<?php

namespace NewsletterTransfer\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

class NewsletterTransferRouteServiceProvider extends RouteServiceProvider
{
    public function map(Router $router)
    {
        $router->get('transfer-newsletter', 'NewsletterTransfer\Controllers\NewsletterTransferController@transfer');
    }
}
