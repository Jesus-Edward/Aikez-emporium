<?php

namespace App\Services;

use GuzzleHttp\Client;

class PaystackService
{
    protected Client $http;
    protected string $secret;
    protected string $baseUrl;
    protected string $clientId;

    public function __construct()
    {
        $this->clientId =  config('payment_settings.paystack_client_id');
        $this->secret = config('payment_settings.paystack_secret_key');
        $this->baseUrl = config('payment_settings.payment_url', 'https://api.paystack.co');
        $this->http = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->secret,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',

            ],
            'verify' => false, // dev only
        ]);
    }

    /** Initialize transaction. Returns array with authorization_url & reference on success */
    public function initialize(array $payload): array
    {
        // payload: email, amount (kobo), reference, callback_url, metadata
        $res = $this->http->post('/transaction/initialize', ['json' => $payload]);
        return json_decode((string)$res->getBody(), true);
    }

    /** Verify by reference */
    public function verify(string $reference): array
    {
        $res = $this->http->get("/transaction/verify/{$reference}");
        return json_decode((string)$res->getBody(), true);
    }
}
