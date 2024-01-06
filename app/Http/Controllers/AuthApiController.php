<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada Kesalahan pada Data Inputan',
                'data' => $validator->errors()
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $dataUser = User::create($input);

        $success['name'] = $dataUser->name;
        $success['email'] = $dataUser->email;

        return response()->json([
            'success' => true,
            'message' => 'Sukses melakukan registrasi',
            'data' => $success
        ]);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $dataAuth = Auth::user();
            $success['token'] = $dataAuth->createToken('auth_token')->plainTextToken;
            $success['name'] = $dataAuth->name;
            $success['email'] = $dataAuth->email;

            return response()->json([
                'success' => true,
                'message' => 'Sukses melakukan login',
                'data' => $success
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Ada kesalahan pada E-mail dan Password',
                'data' => null
            ]);
        }
    }
}
