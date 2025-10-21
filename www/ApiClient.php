<?php
require_once __DIR__ . '/../vendor/autoload.php';
use GuzzleHttp\Client;

class ApiClient {
    private Client $client;
    public function __construct() {
        $this->client = new Client([
            'verify' => false, 
            'headers' => ['User-Agent' => 'Nginx-PHP-Labs/1.0']
        ]);
    }
    public function request(string $url): array {
        try {
            $response = $this->client->get($url);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}