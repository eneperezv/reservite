<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Config\Config;

class ApiService
{
    protected $client;
    protected $baseUrl;
    protected $config;

    public function __construct()
    {
        $this->config = new Config();
        $this->baseUrl = $this->config->get('API', 'BASE_URL');
        $this->client = new Client(['base_uri' => $this->baseUrl]);
    }

    public function post($endpoint, $data, $headers = [])
    {
        $response = $this->client->post($endpoint, [
            'json' => $data,
            'headers' => $headers
        ]);

        return json_decode($response->getBody(), true);
    }

    public function get($endpoint, $params = [], $headers = [])
    {
        $response = $this->client->get($endpoint, [
            'query' => $params,
            'headers' => $headers
        ]);

        return json_decode($response->getBody(), true);
    }

    public function getAuthEndpoint()
    {
        return $this->config->get('API', 'AUTH_ENDPOINT');
    }

    public function getClientsSearchEndpoint()
    {
        return $this->config->get('API', 'CLIENTS_SEARCH_ENDPOINT');
    }

    public function getReservationEndpoint()
    {
        return $this->config->get('API', 'RESERVATION_ENDPOINT');
    }
}

?>