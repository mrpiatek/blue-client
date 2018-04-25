<?php

namespace spec\MrPiatek\BlueClient\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use MrPiatek\BlueClient\Services\ProductsStoringService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductsStoringServiceSpec extends ObjectBehavior
{
    const API_PREFIX = 'api/v1';

    function let(Client $httpClient)
    {
        $this->beConstructedWith($httpClient);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ProductsStoringService::class);
    }

    public function it_gets_products_in_stock(Client $httpClient, Response $response)
    {
        $product = ['name' => 'Product 1', 'amount' => 6];
        $response->getBody()->willReturn('[]');

        $httpClient->request('POST', self::API_PREFIX . '/products', Argument::any())
            ->shouldBeCalled()
            ->willReturn($response);

        $this->addProduct($product['name'], $product['amount']);
    }
}
