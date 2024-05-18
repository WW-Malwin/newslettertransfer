<?php

namespace NewsletterTransfer\Services;

use Plenty\Modules\Plugin\Settings\Contracts\SettingsRepositoryContract;
use Plenty\Plugin\ConfigRepository;

class SettingsService
{
    public function handle(SettingsRepositoryContract $settingsRepository, ConfigRepository $configRepository)
    {
        $settingsRepository->addTextField('apiEndpoint', 'API Endpoint', true, 'https://api.emailsys.net/v1/subscribers');
        $settingsRepository->addTextField('username', 'Username', true, '');
        $settingsRepository->addPasswordField('password', 'Password', true, '');
    }
}
