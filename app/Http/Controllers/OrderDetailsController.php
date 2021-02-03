<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersDetailsRequest;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderDetailsController extends Controller
{
    public function index()
    {

        return response()->json(OrderDetail::paginate(), Response::HTTP_OK);
    }

    public function store(OrdersDetailsRequest $request)
    {
        $orderDetails = OrderDetail::create([

            $request->only('order_id','product_id')

        ]);
        return response($orderDetails, Response::HTTP_CREATED);
    }


    public function show($id)
    {
        return response()->json(OrderDetail::find($id));
    }

    public function update(OrdersDetailsRequest $request, $id)
    {
        $orderDetails = OrderDetail::find($id);

        $orderDetails->update($request->only('order_id','product_id'));

        return response($orderDetails, Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        OrderDetail::destroy($id);

        return response()->json(null, Response::HTTP_OK);
    }
}
