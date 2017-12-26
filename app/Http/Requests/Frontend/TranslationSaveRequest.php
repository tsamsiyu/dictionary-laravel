<?php
/**
 * Created by PhpStorm.
 * User: tsamsiyu
 * Date: 02.11.17
 * Time: 22:27
 */

namespace App\Http\Requests;

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
            'groups' => 'required|array',
            'groups.*.explanation' => 'nullable|string',
            'groups.*.translations' => 'required|array',
            'groups.*.translations.spelling' => 'required|string',
        ];
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