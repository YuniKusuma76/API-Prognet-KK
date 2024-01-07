<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $dataUser = new User();

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan registrasi',
                'data' => $validator->errors()
            ]);
        }

        $dataUser->name = $request->name;
        $dataUser->email = $request->email;
        $dataUser->password = $request->password;

        $dataUser['password'] = bcrypt($dataUser['password']);
        $post = $dataUser->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan registrasi'
        ]);
    }

    public function login()
    {
        validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        $user = User::where('email', request('email'))->first();

        if (Hash::check(request('password'), $user->getAuthPassword())) {
            return [
                'token' => $user->createToken(time())->plainTextToken
            ];
        }
    }
}
