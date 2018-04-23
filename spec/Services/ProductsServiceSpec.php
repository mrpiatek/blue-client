<?php

namespace spec\MrPiatek\BlueClient\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use MrPiatek\BlueClient\Services\ProductsService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductsServiceSpec extends ObjectBehavior
{
    const API_PREFIX = 'api/v1';

    function let(Client $httpClient)
    {
        $this->beConstructedWith($httpClient);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ProductsService::class);
    }

    public function it_gets_products_in_stock(Client $httpClient, Response $response)
    {
        $products = [
            ['id' => 1, 'name' => 'Product 1', 'amount' => 6],
            ['id' => 2, 'name' => 'Product 2', 'amount' => 9]
        ];
        $response->getBody()->willReturn(json_encode([
            'data' => $products
        ]));

        $httpClient->get(self::API_PREFIX . '/products/in-stock')->shouldBeCalled()->willReturn($response);

        $this->getProductsInStock()->shouldReturn($products);
    }

    public function it_gets_products_out_of_stock(Client $httpClient, Response $response)
    {
        $products = [
            ['id' => 1, 'name' => 'Product 1', 'amount' => 0],
            ['id' => 2, 'name' => 'Product 2', 'amount' => 0]
        ];
        $response->getBody()->willReturn(json_encode([
            'data' => $products
        ]));

        $httpClient->get(self::API_PREFIX . '/products/out-of-stock')->shouldBeCalled()->willReturn($response);

        $this->getProductsOutOfStock()->shouldReturn($products);
    }

    public function it_gets_products_with_amount_over_five(Client $httpClient, Response $response)
    {
        $products = [
            ['id' => 1, 'name' => 'Product 1', 'amount' => 6],
            ['id' => 2, 'name' => 'Product 2', 'amount' => 7]
        ];
        $response->getBody()->willReturn(json_encode([
            'data' => $products
        ]));

        $httpClient->get(self::API_PREFIX . '/products/amount-over-five')->shouldBeCalled()->willReturn($response);

        $this->getProductsWithAmountOverFive()->shouldReturn($products);
    }
}
