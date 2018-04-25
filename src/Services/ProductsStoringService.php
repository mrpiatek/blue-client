<?php

namespace MrPiatek\BlueClient\Services;


use GuzzleHttp\Exception\ClientException;
use MrPiatek\BlueClient\Exceptions\UnprocessableEntityException;

class ProductsStoringService extends ProductsService
{
    public function addProduct(?string $name, ?int $amount)
    {
        try {
            $this->request('POST', '/products', [
                'name' => $name,
                'amount' => $amount
            ]);
        } catch (ClientException $e) {
            throw new UnprocessableEntityException(json_decode($e->getResponse()->getBody(), true)['errors']);
        }
    }
}
