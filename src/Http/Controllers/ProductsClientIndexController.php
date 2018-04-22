<?php

namespace MrPiatek\BlueClient\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use MrPiatek\BlueClient\Services\ProductsService;

class ProductsClientIndexController extends BaseController
{

    /**
     * @var ProductsService
     */
    private $productsService;

    /**
     * ProductsClientController constructor.
     *
     * @param ProductsService $productsService
     */
    public function __construct(ProductsService $productsService)
    {
        $this->productsService = $productsService;
    }

    /**
     * Returns HTTP response with products in stock index.
     *
     * @return Response
     */
    public function productsInStock(): Response
    {
        $data = $this->productsService->getProductsInStock();
        return view()->with('data', $data);
    }

    /**
     * Returns HTTP response with products out of stock index.
     *
     * @return Response
     */
    public function productsOutOfStock(): Response
    {

    }

    /**
     * Returns HTTP response with products with amount over five.
     *
     * @return Response
     */
    public function productsAmountOverFive(): Response
    {

    }
}