<?php


namespace App\Virtual\Requests\Auth;

/**
 * @OA\Schema(
 *      title="New User Activatation request",
 *      description="User Signup Activate Request body data",
 *      type="object",
 *      required={"activation_token"}
 * )
 */

class UserSignupActivateRequest
{
    /**
     * @OA\Property(
     *     title="activation_token",
     *     type="string",
     *     description="Enter your activation token from the email you received",
     *     format="token",
     *     example="u1t1upplsNNtqVpDO0ANeWqPhTAmeHddAKaBTBJZM3pYJnLo6FiFYXnHCYMv"
     * )
     * @var  String
     */
    public $activation_token;
}
