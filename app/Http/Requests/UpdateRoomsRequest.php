<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoomsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'number' => [
                'required',
                'integer',
                Rule::unique('rooms')->ignore($this->route('room')->id),
            ],
            'price' => ['required', 'integer'],
            'description' => ['required', 'string', 'max:255'],
            'available' => ['required', 'integer', 'min:0', 'max:1'],
            'img_path' => ['nullable', 'string', 'max:255'],
        ];
    }

}


