<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{

    public function index()
    {

        return response()->json(Order::paginate(), Response::HTTP_OK);
    }

    public function store(OrdersRequest $request)
    {
        $order = Order::create([

            $request->only('order_number')

        ]);
        return response($order, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json(Order::find($id));
    }

    public function update(OrdersRequest $request, $order)
    {
        $order = Order::find($id);

        $order->update($request->only('first_name', 'lastname', 'email'));

        return response($order, Response::HTTP_ACCEPTED);
    }

      public function destroy($id)
    {
        Order::destroy($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
