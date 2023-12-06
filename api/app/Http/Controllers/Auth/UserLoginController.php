<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Http\Resources\Auth\UserLoginResource;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    /**
     * Handle the incoming request.
     * 
     * @param LoginRequest $request
     * @return LoginResource
     * @throws AuthenticationException
     */
    public function __invoke(LoginRequest $request): LoginResource
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return new LoginResource(Auth::user());
        }

        throw new AuthenticationException();
    }
}