<?php

namespace spec\MrPiatek\BlueClient\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use MrPiatek\BlueClient\Services\ProductsUpdatingService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductsUpdatingServiceSpec extends ObjectBehavior
{
    const API_PREFIX = 'api/v1';

    function let(Client $httpClient)
    {
        $this->beConstructedWith($httpClient);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ProductsUpdatingService::class);
    }

    public function it_updates_products(Client $httpClient, Response $response)
    {
        $product = ['id' => 4, 'name' => 'Product X', 'amount' => 0];
        $response->getBody()->willReturn('[]');

        $httpClient->request('PUT', self::API_PREFIX . "/products/{$product['id']}", Argument::any())
            ->shouldBeCalled()
            ->willReturn($response);

        $this->updateProduct($product['id'], $product['name'], $product['amount']);
    }
}
