<?php

namespace App\Virtual\Requests\Auth;

/**
 * @OA\Schema(
 *      title="User Login request",
 *      description="User Login request body data",
 *      type="object",
 *      required={"email,passowrd"}
 * )
 */
class UserLoginRequest
{
    /**
     * @OA\Property(
     *     description = "Users Email",
     *     title = "email",
     *     type = "string",
     *     format = "email",
     *     example = "user1@mail.com"
     *)
     *
     * @var String
     */
    public $email;

    /**
     * @OA\Property(
     *     title="password",
     *     type="string",
     *     description="password for your account",
     *     format="password",
     *     example="PassWord12345"
     * )
     * @var  String
     */
    public $password;
    /**
     * @OA\Property(
     *     title="password_confirmation",
     *     type="string",
     *     description="confirm password for your account",
     *     format="password",
     *     example="PassWord12345"
     * )
     * @var  String
     */
    public $password_confirmation ;

    /**
     * @OA\Property(
     *     title="remember_me",
     *     type="boolean",
     *     example="true"
     * )
     *
     * @var boolean
     */

    public $remember_me;
}
