<?php
/**
 * Created by PhpStorm.
 * User: tsamsiyu
 * Date: 02.11.17
 * Time: 23:06
 */

namespace App\Http\Controllers\Frontend;

use App\Core\Controller;
use App\Extensions\FileDb\FileDb;
use App\Http\Requests\NewWordRequest;
use App\Models\Translation;
use App\Models\TranslationGroup;
use App\Models\Word;

class MyDictionaryController extends Controller
{
    public function newWord(NewWordRequest $request)
    {
        return app('db')->transaction(function () use($request) {
            $data = $request->all();
            $word = new Word();
            $word->writing = array_get($data, 'word');
            $word->root = array_get($data, 'root');
            $word->author_id = auth()->user()->getAuthIdentifier(); // todo: move to observer
            $word->language_part_id = array_get($data, 'languagePart');
            $word->language_id = 1;
            $word->setRelation('translations', collect());
            $word->saveOrFail();
            foreach (array_get($data, 'sense') as $sense) {
                if (!empty($sense['name'])) {
                    $group = new TranslationGroup();
                    $group->explanation = array_get($sense, 'name');
                    $group->saveOrFail();
                }
                foreach (array_get($sense, 'translation') as $mean) {
                    $translation = new Translation();
                    $translation->text = array_get($mean, 'word');
                    $translation->is_figurative = array_get($mean, 'isFigurative');
                    $translation->is_conversational = array_get($mean, 'isConversational');
                    $translation->explanation = array_get($mean, 'explanation');
                    $translation->applying_style_id = array_get($mean, 'applyingStyle');
                    $translation->translated_word_id = $word->id;
                    if (isset($group)) {
                        $translation->group_id = $group->id;
                        $translation->setRelation('group', $group);
                    }
                    $translation->saveOrFail();
                    $word->translations->push($translation); // todo: check this approach
                }
            }

            return response()->json([
                'model' => $word
            ]);
        });
    }
}