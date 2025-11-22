<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWeatherRequest extends FormRequest
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
        'city'        => 'sometimes|string|in:Kyiv,Lviv,Odesa,Kharkiv,Dnipro,Zaporizhzhia',
        'temperature' => 'sometimes|numeric',
        'date'        => 'sometimes|date',
        ];
    }
}

