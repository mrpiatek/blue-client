<?php

namespace MrPiatek\BlueClient\Services;

use GuzzleHttp\Client;

class ProductsService
{
    const API_PREFIX = 'api/v1';

    private $httpClient;

    /**
     * ProductsService constructor.
     * @param $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Gets products in stock.
     *
     * @return array
     */
    public function getProductsInStock(): array
    {
        return $this->getProducts('/products/in-stock');
    }

    /**
     * Gets products out of stock.
     *
     * @return array
     */
    public function getProductsOutOfStock(): array
    {
        return $this->getProducts('/products/out-of-stock');
    }

    /**
     * Gets products with amount over five.
     *
     * @return array
     */
    public function getProductsWithAmountOverFive(): array
    {
        return $this->getProducts('/products/amount-over-five');
    }

    /**
     * Gets products from given endpoint using GET request.
     *
     * @param string $endpoint
     *
     * @return array
     */
    private function getProducts(string $endpoint)
    {
        $response = $this->httpClient->get(self::API_PREFIX . $endpoint);
        $responseData = json_decode((string)$response->getBody(), true);
        return $responseData['data'];
    }
}
