<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Http\Resources\Auth\UserRegisterResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        $serial_prefix = $request->is_mentor == 1 ? 'm' : 's';

        // serial_idを一意に定める
        while(true) {
            $serial_id = $serial_prefix. (string) str_pad((string) random_int(0, 999999), 6, "0", STR_PAD_LEFT);
            if(!User::where('serial_id', $serial_id)->exists()) {
                break;
            }
        }

        $user = User::create([
            'serial_id' => $serial_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_mentor' => $request->is_mentor,
        ]);

        return new RegisterResource($user);
    }
}
