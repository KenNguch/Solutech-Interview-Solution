<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Utils\ApiResponsesController;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends ApiResponsesController
{
    public function index()
    {
        return $this->showAll(User::All());
    }

    public function store(Request $request)
    {
        $request->validate($rules =
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'phone_number' => 'required|numeric|unique:users',
                'identification_number' => 'required|numeric|unique:users',
            ]
        );

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'identification_number' => $request->identification_number,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
            'verified' => User::UNVERIFIED_USER,
            'verification_token' => User::generateVerificationToken(),
            'admin' => User::REGULAR_USER,
        ]);
        $user->save();
        return $this->showOne($user);
    }


    public function show($id)
    {
        return $this->showOne(User::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate($rules =
            [
                'name' => 'string',
                'email' => 'email|unique:users,email,' . $user->id,
                'password' => '|min:6',
                'phone_number' => 'numeric|unique:users,phone_number,' . $user->phone_number,
                'identification_number' => 'numeric|unique:users,identification_number' . $user->identification_number,
                'admin' => 'in' . User::ADMIN_USER . ',' . User::REGULAR_USER,
            ]);


        if ($request->has('name')) {

            $user->name = $request->name;
        }
        if ($request->has('identification_number')) {

            $user->identification_number = $request->identification_number;
        }


        if ($request->has('email') && $user->email != $request->email) {

            $user->verified = User::UNVERIFIED_USER;
            $user->verification_token = User::generateVerificationToken();
            $user->email = $request->email;
        }
        if ($request->has('phone_number') && $user->phone_number != $request->phone_number) {

            $user->email = $request->phone_number;
        }

        if ($request->has('password')) {


            $user->password = bcrypt($request->password);
        }

        if ($request->has('admin')) {

            if (!$user->isVerified()) {
                return $this->errorResponse('Only verified users can be admins', 422);

            }
            $user->admin = $request->admin;
        }

        if (!$user->isDirty()) {

            return $this->errorResponse('You need to specify the changes to be made', Response::HTTP_UNPROCESSABLE_ENTITY);

        }

        return $this->showOne($user);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return $this->deleteResponse('Your Account has been Deleted Successfully');
    }
}
