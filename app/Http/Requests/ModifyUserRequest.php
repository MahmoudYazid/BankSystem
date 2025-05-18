<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class ModifyUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $payload = JWTAuth::getPayload();
        $userId = $payload->get('user_id');
        return User::where('id', $userId)->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "Id_user"=>"required | numeric",
            "data"=>"required | string",
            "column"=>"required | string",
            //
        ];
    }
}
