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
     *      path="/auth/orders",
     *      operationId="getOrdersList",
     *      tags={"Orders"},
     *      summary="Get list of orders",
     *      description="Returns list of orders",
     *security={
     *{
     *"passport": {}},
     *},
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
     *      path="/auth/orders",
     *      operationId="storeOrder",
     *      tags={"Orders"},
     *      summary="Create a new order",
     *      description="Returns order data",
     *security={
     *{
     *"passport": {}},
     *},
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
            'order_number' => $request->order_number
        ]);

        return response()->json($order, Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/auth/orders/{id}",
     *      operationId="getOrderById",
     *      tags={"Orders"},
     *      summary="Get order information",
     *      description="Returns order data",
     *security={
     *{
     *"passport": {}},
     *},
     *      @OA\Parameter(
     *          name="id",
     *          description="Orders id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
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
    public function show($id)
    {
        return response()->json(Order::find($id));
    }

    /**
     * @OA\Put(
     *      path="/auth/orders/{id}",
     *      operationId="updateOrder",
     *      tags={"Orders"},
     *      summary="Update existing order",
     *      description="Returns updated order data",
     *security={
     *{
     *"passport": {}},
     *},
     *      @OA\Parameter(
     *          name="id",
     *          description="Order id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateOrderRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(OrdersRequest $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->only('order_number'));

        return response($order, Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/auth/orders/{id}",
     *      operationId="deleteOrder",
     *      tags={"Orders"},
     *      summary="Delete existing order",
     *      description="Deletes a record and returns no content",
     *security={
     *{
     *"passport": {}},
     *},
     *      @OA\Parameter(
     *          name="id",
     *          description="Order id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy($id)
    {
        Order::destroy($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
