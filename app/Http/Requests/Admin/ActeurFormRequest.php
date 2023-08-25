<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActeurFormRequest extends FormRequest
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
            'nom' => ['required', 'min:2'],
            'genre' => ['required',Rule::in(['M','F'])],
            'nationalite' => ['required', 'min:2'],
            'lieunais' => ['required', 'min:2'],
            'age' => ['required'],
            'contact' => ['required', 'min:2'],
            'address' => ['required', 'min:2'],
            'profession' => ['required', 'min:2'],
            'niveau' => ['required'] 
        ];
    }
}
