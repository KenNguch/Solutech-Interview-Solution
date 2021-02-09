<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    public function index()
    {

        return Product::paginate();
    }

    public function store(ProductsRequest $request)
    {
        $product = Product::create([

            $request->only('name', 'description', 'quantity')

        ]);
        return response($product, Response::HTTP_CREATED);
    }


    public function show($id)
    {
        return response()->json(Product::find($id));
    }

    public function update(ProductsRequest $request, $id)
    {
        $product = Product::find($id);

        $product->update($request->only('name', 'description', 'quantity'));

        return response($product, Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return response()->json(null, Response::HTTP_OK);
    }
}
