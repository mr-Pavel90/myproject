<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'     => 'sometimes|string',
            'email'    => 'sometimes|email|unique:users,email',
            'phone'    => 'sometimes|string',
            'password' => 'sometimes|string|min:4',
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->password) {
            $this->merge([
                'password' => Hash::make($this->password),
            ]);
        }
    }
}
