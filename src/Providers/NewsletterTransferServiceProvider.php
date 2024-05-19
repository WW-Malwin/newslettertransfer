<?php

namespace NewsletterTransfer\Providers;

use Plenty\Plugin\ServiceProvider;

class NewsletterTransferServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(NewsletterTransferRouteServiceProvider::class);
        $this->getApplication()->register(NewsletterTransferConfigServiceProvider::class);
    }
}
