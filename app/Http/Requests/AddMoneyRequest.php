<?php

namespace App\Http\Requests;

use App\Models\user;
use Illuminate\Foundation\Http\FormRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class AddMoneyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
       $payload = JWTAuth::getPayload();
        $userId = $payload->get('user_id');
        return user::where('id', $userId)->exists();
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
            "amount"=>"required | integer"
            
        ];
    }
}
