<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|max:255",
            "email" => "required|email|max:255",
            "phone_number" => "required|numeric",
            "address" => "required",
            "transaction_total" => "integer",
            "transaction_status" => "nullable|in:Pending,Gagal,Sukses",
            "transaction_details" => "required|array",
            "transaction_details.*" => "integer" 
        ];
    }
}
