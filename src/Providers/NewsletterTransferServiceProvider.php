<?php

namespace NewsletterTransfer\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\ConfigRepository;

class NewsletterTransferServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(NewsletterTransferRouteServiceProvider::class);
        $this->getApplication()->register(NewsletterTransferConfigServiceProvider::class);
    }

    public function boot(ConfigRepository $configRepository)
    {
        // Registrieren Sie den Menüpunkt
        $configRepository->set('plugin.menu', [
            'label' => 'Newsletter Transfer Plugin',
            'url' => '/newsletter-transfer/config',
            'icon' => 'fa-envelope'
        ]);
    }
}
