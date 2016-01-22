<?php

namespace App\Http\Api\Controllers;

use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        //参考： https://github.com/huanghua581/dingo-api-demo/blob/master/app/Http/Controllers/Api/V1/AuthenticateController.php
        // 验证规则
        $rules = [
            'name' => ['required', 'min:3'],
            'password' => ['required', 'min:6'],
            'email' => ['required', 'email']
        ];

        $payload = app('request')->only('name', 'email', 'password');
        $validator = app('validator')->make($payload, $rules);


        // 验证格式
        if ($validator->fails()) {
            return $this->response->array(['error' => $validator->errors()]);
        }

        $newUser = [
            'email' => $request->get('email'),
            'name' => $request->get('name'),
            'password' => bcrypt($request->get('password')),
        ];

        $user = User::create($newUser);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('token'));
    }


    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }
}