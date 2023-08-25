<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NaissanceFormRequest extends FormRequest
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
            'datenais' => ['required', 'date'],
            'lieunais' => ['required', 'min:2'],
            'contact' => ['required', 'min:2'],
            'address' => ['required', 'min:2'],
            'pere' => ['required', 'min:2'],
            'mere' => ['required', 'min:2'],
            'mode' => ['required', 'min:2'],
        ];
    }
}
