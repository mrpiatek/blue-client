<?php

namespace MrPiatek\BlueClient\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;

class ProductsService
{
    private const API_PREFIX = 'api/v1';

    protected $httpClient;

    /**
     * ProductsService constructor.
     * @param $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Sends a request to the API.
     *
     * @param string $method
     * @param string $endpoint
     * @param array $data
     * @return mixed
     */
    protected function request(string $method, string $endpoint, array $data = [])
    {
        $options = [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ];
        if (count($data) > 0) {
            $options['json'] = $data;
        }

        try {
            $response = $this->httpClient->request($method, self::API_PREFIX . $endpoint, $options);
        } catch (ServerException $e) {

        }
        $body = (string)$response->getBody();
        if ($body) {
            $responseData = json_decode($body, true);
            return array_key_exists('data', $responseData) ? $responseData['data'] : [];
        } else {
            return null;
        }
    }
}
