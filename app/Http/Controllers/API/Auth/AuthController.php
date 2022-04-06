<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(AuthRequest $request)
    {
        $register = $this->repository->createUser($request);
        $user = $register->user;
        $token = $register->token;

        return response()->json([
            'succes' => 'true',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ], 201);
    }


    public function login(AuthRequest $request)
    {
        $login = $this->repository->getUserByUsername($request->username);
        $user = $login->user;
        $token = $login->token;

        return response()->json([
            'succes' => 'true',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ], 200);


    }
}
