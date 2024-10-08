<?php
/*
 * @(#)ApiService.php 1.0 22/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * @author eliezer.navarro
 * @version 1.0 | 22/09/2024
 * @since 1.0
 */ 
namespace App\Services;

class ApiService
{
    private $baseUrl;
    private $token;
    private $logger;

    public function __construct($baseUrl, $token, Logger $logger)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->token = $token;
        $this->logger = $logger;
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

        $this->logger->error("Error: HTTP {$httpCode} - Response: {$response}","SYSTEM");

        return [
            'error' => true,
            'status_code' => $httpCode,
            'response' => $decodedResponse ?? $response
        ];
    }
}
