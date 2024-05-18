<?php

namespace NewsletterTransfer\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\ConfigRepository;

class ConfigController extends Controller
{
    public function showConfig(Twig $twig, ConfigRepository $configRepository)
    {
        $apiEndpoint = $configRepository->get('NewsletterTransfer.apiEndpoint');
        $username = $configRepository->get('NewsletterTransfer.username');
        $password = $configRepository->get('NewsletterTransfer.password');

        return $twig->render('NewsletterTransfer::content.config', [
            'apiEndpoint' => $apiEndpoint,
            'username' => $username,
            'password' => $password
        ]);
    }

    public function saveConfig(Request $request, ConfigRepository $configRepository)
    {
        $configRepository->set('NewsletterTransfer.apiEndpoint', $request->get('apiEndpoint'));
        $configRepository->set('NewsletterTransfer.username', $request->get('username'));
        $configRepository->set('NewsletterTransfer.password', $request->get('password'));

        return redirect()->back()->with('success', 'Configuration saved successfully');
    }
}
