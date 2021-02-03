<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuppliersProductsRequest;
use App\Models\SupplierProduct;
use Symfony\Component\HttpFoundation\Response;

class SupplierProductsController extends Controller
{
    public function index()
    {

        return response()->json(SupplierProduct::paginate(), Response::HTTP_OK);
    }

    public function store(SuppliersProductsRequest $request)
    {
        $supplierProduct = SupplierProduct::create([

            $request->only('supply_id','product_id')

        ]);
        return response($supplierProduct, Response::HTTP_CREATED);
    }


    public function show($id)
    {
        return response()->json(SupplierProduct::find($id));
    }

    public function update(SuppliersProductsRequest  $request, $id)
    {
        $supplierProduct = SupplierProduct::find($id);

        $supplierProduct->update($request->only('supply_id','product_id'));

        return response($supplierProduct, Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        SupplierProduct::destroy($id);

        return response()->json(null, Response::HTTP_OK);
    }
}
