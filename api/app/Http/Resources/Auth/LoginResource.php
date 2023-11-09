<?php
declare(strict_types=1);

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => [
                'type' => 'users',
                'serial_id' => $this->serial_id,
                'attributes' => [
                    'name' => $this->name,
                    'email' => $this->email,
                    'is_mentor' => $this->is_mentor,
                ],
            ]
        ];
    }
}
