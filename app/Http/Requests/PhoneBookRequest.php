<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PhoneBookRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first' => 'required',
            'last' => 'required',
            'phone' => 'required|regex:/^\d{3}-\d{3}-\d{4}$/i',
            'email' => 'required|email',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            "first.required" => "First name is required",
            "last.required" => "Last name is required",
            "phone.required" => "Phone number is required",
            "email.required" => "Email is required",
            "email.email" => "Please provide a valid email",
            "phone.regex" => "The phone number format should be ###-###-####",
        ];
    }
}
