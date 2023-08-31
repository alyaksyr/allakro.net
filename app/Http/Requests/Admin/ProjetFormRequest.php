<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjetFormRequest extends FormRequest
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
            'libelle' => ['required', 'min:2'],
            'description' => ['required'],
            'initiateur' => ['required'],
            'delai' => ['required'],
            'datedebut' => ['required'],
            'datefin' => ['required'],
            'etat' => ['required'],
        ];
    }
}