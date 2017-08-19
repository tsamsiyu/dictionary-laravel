<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'                  => 'required|string|max:255',
            'registrationNumber'    => 'required|string|max:255',
            'registrationDate'      => 'required|date',
            'accountDueDate'        => 'required|date',
            'incorporationDate'     => 'required|date',
            'jurisdictionId'        => 'required|jurisdictions,id',
            'yearEnd'               => 'numeric',
            'activity'              => 'string|max:255',
            'informationNotes'      => 'string',
            'agents'                => 'string',
            'auditors'              => 'string',
        ];
    }
}
