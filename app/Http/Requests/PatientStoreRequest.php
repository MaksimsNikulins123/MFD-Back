<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
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
            'date_of_registration' => 'required',
            'name' => 'required|max:191',
            'surname' => 'required|max:191',
            'personal_code' => 'required|max:12',
            'complaints_and_anamnesis' => 'required|max:191',
            'adjacent_deseases' => 'required|max:191',
            'drug_intolerance_allergies' => 'required|max:191',
          
                

        ];
    }
}
