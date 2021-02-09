<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuppliersRequest;
use App\Models\Supplier;
use Symfony\Component\HttpFoundation\Response;

class SupplierController extends Controller
{
    public function index()
    {
        return response()->json(Supplier::paginate(), Response::HTTP_OK);
    }

    public function store(SuppliersRequest $request)
    {
        $supplier = Supplier::create([
            $request->only('name', 'description', 'quantity')
        ]);
        return response($supplier, Response::HTTP_CREATED);
    }


    public function show($id)
    {
        return response()->json(Supplier::find($id));
    }

    public function update(SuppliersRequest $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->update($request->only('name', 'description', 'quantity'));

        return response($supplier, Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Supplier::destroy($id);
        return response()->json(null, Response::HTTP_OK);
    }
}
