<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActiviteFormRequest extends FormRequest
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
            'secteur'=>['required'],
            'libelle'=>['required','min:5'],
            'description'=>['required'],
            'contact'=>['required','min:10'],
            'address'=>['required','min:10'],
            'photo' => ['image', '2000'],
            'email' => [],
            'acteur_id' => ['required'],
        ];
    }
}
