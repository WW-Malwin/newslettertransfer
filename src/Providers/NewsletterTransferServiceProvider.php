<?php

namespace NewsletterTransfer\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\ConfigRepository;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Modules\Plugin\Menu\Contracts\MenuRepositoryContract;
use Plenty\Modules\Plugin\Menu\Events\LoadMenu;
use NewsletterTransfer\Providers\NewsletterTransferRouteServiceProvider;
use NewsletterTransfer\Providers\NewsletterTransferConfigServiceProvider;

class NewsletterTransferServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(NewsletterTransferRouteServiceProvider::class);
        $this->getApplication()->register(NewsletterTransferConfigServiceProvider::class);
    }

    public function boot(MenuRepositoryContract $menuRepository, Dispatcher $eventDispatcher)
    {
        // Menüeintrag unter "Einstellungen" hinzufügen
        $eventDispatcher->listen(LoadMenu::class, function (LoadMenu $event) use ($menuRepository) {
            $menuRepository->addSubMenu(
                'menu.settings',  // Dies ist der Menübereich "Einstellungen"
                'NewsletterTransfer',
                [
                    'name' => 'Newsletter Transfer Plugin',
                    'url' => '/newsletter-transfer/config',
                    'icon' => 'fa-envelope'
                ]
            );
        });
    }
}
