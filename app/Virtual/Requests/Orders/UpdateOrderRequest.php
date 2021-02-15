<?php


namespace App\Virtual\Requests\Orders;

/**
 * @OA\Schema(
 *      title="Update Order request",
 *      description="Update Order request body data",
 *      type="object",
 *      required={"order_number"}
 * )
 */
class UpdateOrderRequest
{
    /**
     * @OA\Property(
     *      title="order_number",
     *      description="Order number for the new order",
     *      format="int64",
     *      example=15
     * )
     *
     * @var integer
     */
    public $order_number;

}
