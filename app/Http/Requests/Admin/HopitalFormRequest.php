<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HopitalFormRequest extends FormRequest
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
            'type' => ['required',Rule::in(['Public','Privé'])],
            'contact' => ['required', 'min:2'],
            'address' => ['required'],
            'bons' => ['array', 'exists:bons,id'],
            'responsable' =>[],
        ];
    }
}
