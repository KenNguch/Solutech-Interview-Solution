<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrdersRequest;
use App\Models\Order;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * @OA\Get(
     *      path="/orders",
     *      operationId="getOrdersList",
     *      tags={"Orders"},
     *      summary="Get list of orders",
     *      description="Returns list of orders",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {

        return response()->json(Order::paginate(), Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *      path="/orders",
     *      operationId="storeOrder",
     *      tags={"Orders"},
     *      summary="create a new order",
     *      description="Returns order data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreOrderRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Order")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
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

    public function update(OrdersRequest $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->only('order_number'));

        return response($order, Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Order::destroy($id);

        return response()->json(null, Response::HTTP_OK);
    }
}
