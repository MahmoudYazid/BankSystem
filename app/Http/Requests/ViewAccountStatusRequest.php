<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
class ViewAccountStatusRequest extends FormRequest
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
        "AccountId"=> "required | numeric",
            //
        ];
    }
}
