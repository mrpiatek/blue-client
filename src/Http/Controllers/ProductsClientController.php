<?php

namespace MrPiatek\BlueClient\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use MrPiatek\BlueClient\Exceptions\UnprocessableEntityException;
use MrPiatek\BlueClient\Services\ProductsStoringService;
use MrPiatek\BlueClient\Services\ProductsUpdatingService;

class ProductsClientController extends BaseController
{

    /**
     * Returns view for creating new products.
     *
     * @return View
     */
    public function create(): View
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

    /**
     * Returns view for editing existing products.
     *
     * @param int $id
     *
     * @return View
     */
    public function edit(int $id): View
    {
        return view('products::edit')->with('id', $id);
    }

    /**
     * Updates given product in the API.
     *
     * @param $id
     * @param Request $request
     * @param ProductsUpdatingService $updatingService
     *
     * @return RedirectResponse
     */
    public function update($id, Request $request, ProductsUpdatingService $updatingService): RedirectResponse
    {
        try {
            $updatingService->updateProduct($id, $request->input('name'), $request->input('amount'));
            $redirect = redirect()->route('products.in-stock');
        } catch (UnprocessableEntityException $e) {
            $redirect = redirect()->route('products.create')->withErrors($e->getErrors());
        }

        return $redirect;
    }

    /**
     * Destroys given product in the API.
     *
     * @param $id
     * @param ProductsUpdatingService $updatingService
     *
     * @return RedirectResponse
     */
    public function destroy($id, ProductsUpdatingService $updatingService): RedirectResponse
    {
        $updatingService->deleteProduct($id);
        return redirect()->route('products.in-stock');
    }
}