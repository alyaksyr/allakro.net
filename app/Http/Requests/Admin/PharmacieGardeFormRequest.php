<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PharmacieGardeFormRequest extends FormRequest
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
            'pharmacie' => ['required'],
            'debut' => ['required', 'date'],
            'fini' => ['required', 'date'],
            'responsable' => ['required', 'min:2'],
            'etat' => ['required'],
        ];
    }
}
