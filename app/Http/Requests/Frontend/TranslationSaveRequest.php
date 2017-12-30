<?php
/**
 * Created by PhpStorm.
 * User: tsamsiyu
 * Date: 02.11.17
 * Time: 22:27
 */

namespace App\Http\Requests\Frontend;

use App\Extensions\FileDb\FileDb;
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
            'groups' => 'required|array',
            'groups.*.explanation' => 'nullable|required_if:dataType,complex|string|max:255',
            'groups.*.translations' => 'required|array',
            'groups.*.translations.*.spelling' => 'required|string|max:255',
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

//    private function languagePartsIds()
//    {
//        return FileDb::collectData('LanguageParts')
//            ->pluck('id')
//            ->implode(',');
//    }
//
//    private function applyingStylesIds()
//    {
//        return FileDb::collectData('ApplyingStyles')
//            ->pluck('id')
//            ->implode(',');
//    }
}