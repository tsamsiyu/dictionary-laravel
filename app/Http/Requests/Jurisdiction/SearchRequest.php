<?php

namespace App\Http\Requests\Jurisdiction;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string sortName
 * @property string sortOrder
 *
 * Class SearchRequest
 * @package App\Http\Requests\Jurisdiction
 */
class SearchRequest extends FormRequest
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
            'sortName' => 'nullable|string|in:id,name',
            'sortOrder' => 'nullable|required_with:sortName|in:asc,desc'
        ];
    }
}
