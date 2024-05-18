<?php

namespace NewsletterTransfer\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\ConfigRepository;
use Plenty\Plugin\Http\Request as PluginRequest;
use Plenty\Modules\Newsletter\Services\NewsletterService;
use GuzzleHttp\Client;

class NewsletterTransferController extends Controller
{
    private $client;
    private $newsletterService;

    public function __construct(NewsletterService $newsletterService, Client $client)
    {
        $this->newsletterService = $newsletterService;
        $this->client = $client;
    }

    public function transfer(PluginRequest $request, ConfigRepository $config)
    {
        $apiEndpoint = $config->get('NewsletterTransfer.apiEndpoint');
        $username = $config->get('NewsletterTransfer.username');
        $password = $config->get('NewsletterTransfer.password');

        // Abrufen der Newsletter-Empfänger von PlentyMarkets
        $subscribers = $this->getNewsletterSubscribers();

        foreach ($subscribers as $subscriber) {
            try {
                $response = $this->client->post($apiEndpoint, [
                    'auth' => [$username, $password],
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'email' => $subscriber['email'],
                        'first_name' => $subscriber['first_name'],
                        'last_name' => $subscriber['last_name'],
                    ],
                ]);

                if ($response->getStatusCode() !== 200) {
                    // Fehlerbehandlung hier
                }
            } catch (\Exception $e) {
                // Fehlerbehandlung hier
            }
        }

        return 'Transfer completed!';
    }

    public function manualTransfer()
    {
        // Hier können Sie eine einfache Ansicht zurückgeben, die einen Button zum Starten des Transfers enthält
        return '<form method="GET" action="/transfer-newsletter"><button type="submit">Transfer Newsletter Recipients</button></form>';
    }

    private function getNewsletterSubscribers()
    {
        // Abrufen der Newsletter-Empfänger von PlentyMarkets
        $subscribers = $this->newsletterService->getRecipients();
        $subscriberList = [];

        foreach ($subscribers as $subscriber) {
            $subscriberList[] = [
                'email' => $subscriber->email,
                'first_name' => $subscriber->firstName,
                'last_name' => $subscriber->lastName,
            ];
        }

        return $subscriberList;
    }
}
