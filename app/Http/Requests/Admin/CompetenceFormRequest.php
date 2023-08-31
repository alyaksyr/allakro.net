<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CompetenceFormRequest extends FormRequest
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
            'secteur' =>['required'],
            'libelle' =>['required','min:5'],
            'description' =>['required'],
            'photo' => ['image', 'max:2000'],
            'acteur_id' => ['required'],
        ];
    }
}
