<?php

namespace App\Virtual\Requests\Orders;

/**
 * @OA\Schema(
 *      title="Store Order request",
 *      description="Store Order request body data",
 *      type="object",
 *      required={"order_number"}
 * )
 */
class StoreOrderRequest
{
    /**
     * @OA\Property(
     *      title="order_number",
     *      description="Order number for the new order",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $order_number;


}
