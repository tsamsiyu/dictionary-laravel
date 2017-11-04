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

class NewWordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'word' => 'required',
            'root' => 'nullable',
            'languagePart' => 'nullable|in:' . $this->languagePartsIds(),
            'sense' => 'required|array',
            'sense.*.name' => 'nullable',
            'sense.*.translation' => 'required|array',
            'sense.*.translation.*.word' => 'required',
            'sense.*.translation.*.isFigurative' => 'nullable|boolean',
            'sense.*.translation.*.isConversational' => 'nullable|boolean',
            'sense.*.translation.*.explanation' => 'nullable',
            'sense.*.translation.*.applyingStyle' => 'nullable|in:' . $this->applyingStylesIds(),
        ];
    }

    private function languagePartsIds()
    {
        return FileDb::collectData('languageParts')
            ->pluck('id')
            ->implode(',');
    }

    private function applyingStylesIds()
    {
        return FileDb::collectData('applyingStyles')
            ->pluck('id')
            ->implode(',');
    }
}