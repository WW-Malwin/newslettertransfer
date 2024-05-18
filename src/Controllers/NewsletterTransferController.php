<?php

namespace NewsletterTransfer\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\ConfigRepository;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Plenty\Modules\Frontend\Services\AccountService;
use Plenty\Modules\Newsletter\Services\NewsletterService;

class NewsletterTransferController extends Controller
{
    private $client;
    private $newsletterService;

    public function __construct(NewsletterService $newsletterService)
    {
        $this->client = new Client();
        $this->newsletterService = $newsletterService;
    }

    public function transfer(Request $request, ConfigRepository $config)
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
            } catch (RequestException $e) {
                // Fehlerbehandlung hier
            }
        }

        return 'Transfer completed!';
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
