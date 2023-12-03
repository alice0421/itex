<?php
declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule, array<mixed>, string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            // email_confirmationを要求
            'email' => ['required', 'unique:users', 'string', 'email', 'confirmed', 'max:255'],
            // 大文字小文字記号それぞれ1文字以上・8文字以上、password_confirmationを要求
            'password' => ['required', 'string', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            'is_mentor' => ['required', 'boolean'],
        ];
    }
}
