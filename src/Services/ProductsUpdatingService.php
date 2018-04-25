<?php

namespace MrPiatek\BlueClient\Services;


use GuzzleHttp\Exception\ClientException;
use MrPiatek\BlueClient\Exceptions\UnprocessableEntityException;

class ProductsUpdatingService extends ProductsService
{
    public function updateProduct(int $productId, ?string $name, ?int $amount)
    {
        try {
            $this->request('PUT', "/products/{$productId}", [
                'name' => $name,
                'amount' => $amount
            ]);
        } catch (ClientException $e) {
            throw new UnprocessableEntityException(json_decode($e->getResponse()->getBody(), true)['errors']);
        }
    }

    public function deleteProduct(int $productId)
    {
        $this->request('DELETE', "/products/{$productId}");
    }
}
