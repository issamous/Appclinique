<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nom'=> 'required|string|max:255',
            'prenom'=> 'required|string|max:255',
            'email' =>'string|email|max:255',
            'cin'=> 'required|string|max:255',
            'tel' => 'string|max:255',
            'age' => 'required|string|max:255'

        ];
    }
}
