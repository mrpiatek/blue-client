<?php

namespace MrPiatek\BlueClient\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use MrPiatek\BlueClient\Exceptions\UnprocessableEntityException;
use MrPiatek\BlueClient\Services\ProductsStoringService;

class ProductsClientController extends BaseController
{

    /**
     * @var ProductsStoringService
     */
    private $productsService;

    /**
     * ProductsClientController constructor.
     *
     * @param ProductsStoringService $productsService
     */
    public function __construct(ProductsStoringService $productsService)
    {
        $this->productsService = $productsService;
    }

    /**
     * Returns view for creating new products.
     *
     * @return View
     */
    public function create()
    {
        return view('products::create');
    }

    /**
     * Adds new product through the API and redirects to products in stock.
     *
     * @param Request $request
     * @param ProductsStoringService $storingService
     *
     * @return RedirectResponse
     */
    public function store(Request $request, ProductsStoringService $storingService): RedirectResponse
    {
        try {
            $storingService->addProduct($request->input('name'), $request->input('amount'));
            $redirect = redirect()->route('products.in-stock');
        } catch (UnprocessableEntityException $e) {
            $redirect = redirect()->route('products.create')->withErrors($e->getErrors());
        }

        return $redirect;
    }
}