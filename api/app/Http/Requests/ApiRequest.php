<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

// NOTE: バリデーションのレスポンスを事前にオーバーライド。各Requestはこれを継承。
class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @param Validator $validator
     * @return void
     * @throws HttpResponseException
     */
    // NOTE: バリデーションのレスポンスをオーバーライド
    protected function failedValidation(Validator $validator): void
    {
        $response = response()->error(
            Response::HTTP_UNPROCESSABLE_ENTITY,
            '422 Unprocessable Entity.',
            // NOTE: $validator->errors()はIlluminate\Support\MessageBag型なので、array型になるよう整形
            $validator->errors()->messages(),
        );

        throw new HttpResponseException($response);
    }
}
