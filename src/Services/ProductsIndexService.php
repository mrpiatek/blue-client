<?php

namespace MrPiatek\BlueClient\Services;


class ProductsIndexService extends ProductsService
{
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
        return $this->request('GET', $endpoint);
    }
}
