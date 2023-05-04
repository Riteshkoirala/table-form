<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['required','regex:/^[a-zA-Z0-9]+$/','max:20','min:2'],
            'middlename' => ['required','regex:/^[a-zA-Z0-9]+$/','max:20','min:2'],
            'lastname' => ['required','regex:/^[a-zA-Z0-9]+$/','max:20','min:2'],
            'age' => ['required','regex:/^[0-9]+$/'],
            'gender' => ['required'],
            'address' => ['nullable','regex:/^[a-zA-Z0-9]+$/','max:20','min:2'],
            'country' => ['nullable'],
            'city' => ['nullable','regex:/^[a-zA-Z0-9]+$/','max:20','min:2'],
            'street' => ['nullable','regex:/^[a-zA-Z0-9]+$/','max:20','min:2'],
            'zipcode' => ['nullable','regex:/^[0-9]+$/','max:20','min:2'],
        ];
    }
}
