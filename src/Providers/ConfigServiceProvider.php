<?php

namespace NewsletterTransfer\Providers;

use Plenty\Plugin\ConfigRepository;
use Plenty\Plugin\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->bind(ConfigRepository::class, function() {
            return [
                'NewsletterTransfer.apiEndpoint' => 'https://api.emailsys.net/v1/subscribers',
                'NewsletterTransfer.username' => 'aa7b7626f2dc134b92db23bf2ff8aa211d614731',
                'NewsletterTransfer.password' => 'fc809b9c33f3b082bd0e1e32050397afff3955c0'
            ];
        });
    }
}
