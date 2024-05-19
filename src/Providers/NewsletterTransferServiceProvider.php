<?php

namespace NewsletterTransfer\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Modules\Backend\Events\BackendMenu;

class NewsletterTransferServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(NewsletterTransferRouteServiceProvider::class);
    }

    public function boot(Dispatcher $dispatcher)
    {
        $dispatcher->listen(BackendMenu::class, function (BackendMenu $menu)
        {
            $menu->add('menu.crm', 'NewsletterTransferPlugin', [
                'name' => 'Newsletter Transfer Plugin',
                'url' => '/newsletter-transfer/config',
                'icon' => 'fa-envelope'
            ]);
        });
    }
}
