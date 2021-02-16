<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */
class User
{


    /**
     * @OA\Property(
     *     title="email",
     *     description="Your Name",
     *     format="name",
     *     example=" Ben Obama"
     * )
     *
     * @var String
     */

    public $name;
    /**
     * @OA\Property(
     *     title="email",
     *     description="Enter Your Email Address",
     *     format="email",
     *     example="user1@mail.com"
     * )
     *
     * @var String
     */

    public $email;
    /**
     * @OA\Property(
     *     title="avatar",
     *     description="avatar",
     *     format="/location",
     *     example="avatar.png"
     * )
     *
     * @var String
     */

    public $avatar;

    /**
     * @OA\Property(
     *     title="active",
     *     type="boolean",
     *     example="true"
     * )
     *
     * @var boolean
     */
    public $active;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="Deleted at",
     *     description="Deleted at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $deleted_at;

    /**
     * @OA\Property(
     *     title="avatar_url",
     *     description="avatar location",
     *     format="/storage/avatars/user_id/avatar.png",
     *     example="/storage/avatars/4/avatar.png"
     * )
     *
     * @var String
     */

    public $avatar_url;

}
