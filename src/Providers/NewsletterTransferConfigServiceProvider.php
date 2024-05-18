<?php

namespace NewsletterTransfer\Providers;

use Plenty\Plugin\ConfigRepository;
use Plenty\Plugin\ServiceProvider;

class NewsletterTransferConfigServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->bind(ConfigRepository::class, function() {
            return [
                'NewsletterTransfer.apiEndpoint' => 'https://api.emailsys.net/v1/subscribers',
                'NewsletterTransfer.username' => 'your_username_here',
                'NewsletterTransfer.password' => 'your_password_here'
            ];
        });
    }
}
