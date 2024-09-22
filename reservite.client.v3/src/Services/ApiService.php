<?php

namespace App\Services;

class ApiService
{
    private $baseUrl;
    private $token;
    private $logger;

    public function __construct($baseUrl, $token, Logger $logger)
    {
        $this->baseUrl = rtrim($baseUrl, '/');  // URL base sin barra final
        $this->token = $token;  // Token JWT
        $this->logger = $logger;  // Instancia del Logger
    }

    public function get($endpoint, $params = [])
    {
        $url = $this->baseUrl . $endpoint;

        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->getHeaders());

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $this->logger->info("GET request to {$url} - Response code: {$httpCode}","SYSTEM");

        return $this->handleResponse($response, $httpCode);
    }

    public function post($endpoint, $data)
    {
        return $this->sendRequest('POST', $endpoint, $data);
    }

    public function put($endpoint, $data)
    {
        return $this->sendRequest('PUT', $endpoint, $data);
    }

    private function sendRequest($method, $endpoint, $data)
    {
        $url = $this->baseUrl . $endpoint;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->getHeaders());
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $this->logger->info("{$method} request to {$url} - Response code: {$httpCode}","SYSTEM");

        return $this->handleResponse($response, $httpCode);
    }

    private function getHeaders()
    {
        return [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token,
        ];
    }

    private function handleResponse($response, $httpCode)
    {
        $decodedResponse = json_decode($response, true);

        if ($httpCode >= 200 && $httpCode < 300) {
            return $decodedResponse;
        }

        // Registrar el error en el log
        $this->logger->error("Error: HTTP {$httpCode} - Response: {$response}","SYSTEM");

        return [
            'error' => true,
            'status_code' => $httpCode,
            'response' => $decodedResponse ?? $response
        ];
    }
}
