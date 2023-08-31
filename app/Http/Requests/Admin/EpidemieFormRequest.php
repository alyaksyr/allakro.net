<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EpidemieFormRequest extends FormRequest
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
            'type' => [],
            'cause' => [],
            'foyer' => ['required'],
            'symptomes' => ['required'],
            'nombre_cas' => [],
            'duree' => [],
            'datedebut' => ['required'],
            'datefin' => [],
            'etat' => ['required'],
        ];
    }
}
