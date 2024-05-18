<?php

namespace NewsletterTransfer\Routes;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

class Web extends RouteServiceProvider
{
    public function map(Router $router)
    {
        $router->get('transfer-newsletter', 'NewsletterTransfer\Controllers\NewsletterTransferController@transfer');
    }
}
