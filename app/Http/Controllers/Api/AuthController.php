<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Str;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:confirmed6|',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $request['password'] = Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());
        $token = $user->createToken('MyTokenName')->accessToken; //給使用者發放Token
        $response = ['token' => $token];
        return response($response, 200);
    }

    public function login(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        if ($valid->fails()) {
            return response(['errors' => $valid->errors()->all()], 422);
        }

        $user = User::where('email', $req->email)->first();

        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                $token = $user->createToken('MyTokenName')->accessToken;
                $response = [
                    'status' => 'success',
                    'token' => $token,
                    'user' => $user
                ];
                return response($response, 200);
            } else {
                return response([
                    'status' => 'fail',
                    'msg' => 'Password Err',
                ], 422);
            }
        } else {
            return response([
                'status' => 'fail',
                'msg' => 'Email Err',
            ], 422);
        }
    }
}
