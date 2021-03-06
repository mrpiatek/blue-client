<?php

namespace MrPiatek\BlueClient\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use MrPiatek\BlueClient\Services\ProductsIndexService;

class ProductsClientIndexController extends BaseController
{

    /**
     * @var ProductsIndexService
     */
    private $productsService;

    /**
     * ProductsClientController constructor.
     *
     * @param ProductsIndexService $productsService
     */
    public function __construct(ProductsIndexService $productsService)
    {
        $this->productsService = $productsService;
    }

    /**
     * Returns HTTP response with products in stock index.
     *
     * @return View
     */
    public function productsInStock(): View
    {
        $products = $this->productsService->getProductsInStock();
        return view('products::index-in-stock')->with('products', $products);
    }

    /**
     * Returns HTTP response with products out of stock index.
     *
     * @return View
     */
    public function productsOutOfStock(): View
    {
        $products = $this->productsService->getProductsOutOfStock();
        return view('products::index-out-of-stock')->with('products', $products);
    }

    /**
     * Returns HTTP response with products with amount over five.
     *
     * @return View
     */
    public function productsAmountOverFive(): View
    {
        $products = $this->productsService->getProductsWithAmountOverFive();
        return view('products::index-amount-over-five')->with('products', $products);
    }
}