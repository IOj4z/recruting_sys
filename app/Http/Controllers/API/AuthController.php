<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password' ))) {
            $user = Auth::user();
            $scope = $request->input('scope');

            if ($user->isApplicant() && $scope !== 'applicant'){
                return \response([
                    'error' => 'Access denied!',
                ], Response::HTTP_FORBIDDEN);
            }

            $token = $user->createToken($scope,[$scope])->accessToken;

            $cookie = \cookie('jwt', $token, 3600);
            return \response([
                'token' => $token,
            ])->withCookie($cookie);
        }

        return response([
            'error' => 'Invalid Credentials!',
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function register(RegisterRequest $request)
    {

        $user = User::create(
            $request->only('name', 'email')
            + [
                'password' => Hash::make($request->input('password')),
                'is_role' => 3
            ]
        );

        return response($user, Response::HTTP_CREATED);
    }

    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return \response([
            'message' => 'success'
        ])->withCookie($cookie);
    }
}
