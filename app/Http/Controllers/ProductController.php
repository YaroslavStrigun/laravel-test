<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\SaveRequest;
use App\Http\Services\Interfaces\ProductServiceInterface;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductServiceInterface $productService
    ) {
    }

    public function index(): Factory|View
    {
        return view('product.index', [
            'products' => Product::query()->paginate(10),
        ]);
    }

    public function create(): Factory|View
    {
        return view('product.edit-add');
    }

    public function store(SaveRequest $request): RedirectResponse
    {
        $product = $this->productService->create($request->validated());
        if (!$product) {
            return redirect()->back()->withErrors('Can not create product!');
        }

        return redirect()->route('products.show', ['product' => $product]);
    }


    public function show(Product $product): Factory|View
    {
        return view('product.edit-add', ['product' => $product]);
    }

    public function update(SaveRequest $request, Product $product): RedirectResponse
    {
        $product = $this->productService->update($product, $request->validated());
        if (!$product) {
            return redirect()->back()->withErrors('Can not update product!');
        }

        return redirect()->route('products.show', ['product' => $product]);
    }

    public function destroy(Product $product): RedirectResponse
    {
        if (!$this->productService->delete($product)) {
            return redirect()->back()->withErrors('Can not delete product!');
        }

        return redirect()->route('products.index');
    }
}
