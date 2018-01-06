<?php
/**
 * Created by PhpStorm.
 * User: tsamsiyu
 * Date: 02.11.17
 * Time: 22:27
 */

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class TranslationSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'spelling' => 'required',
            'dataType' => 'required|in:simple,complex',

            'translation_groups' => 'nullable|array',
            'translation_groups.*.explanation' => 'nullable|required_if:dataType,complex|string|max:255',
            'translation_groups.*.translations' => 'nullable|required_if:dataType,complex|array',
            'translation_groups.*.translations.*.spelling' => 'nullable|required_if:dataType,complex|string|max:255',

            'translations' => 'nullable|array',
            'translations.*.spelling' => 'nullable|required_if:dataType,simple|string|max:255',
        ];
    }

    public function messages()
    {
        return array_merge(parent::messages(), [
            'groups.*.explanation.required_if' => 'Group is required for complex translation',
        ]);
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'spelling' => 'original',
            'groups.*.translations.*.spelling' => 'translation',
        ]);
    }
}