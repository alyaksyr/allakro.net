<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class OffreEmploiFormRequest extends FormRequest
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
            'libelle' => ['required','min:2'],
            'competence' => ['required', 'min:2'],
            'photo' => [],
            'contact' => ['required', 'min:2'],
            'description' => ['required'],
            'status' => ['required'],
        ];
    }
}
