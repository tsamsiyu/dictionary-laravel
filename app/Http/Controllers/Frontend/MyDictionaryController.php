<?php
/**
 * Created by PhpStorm.
 * User: tsamsiyu
 * Date: 02.11.17
 * Time: 23:06
 */

namespace App\Http\Controllers\Frontend;

use App\Core\Controller;
use App\Http\Requests\NewWordRequest;
use App\Models\Translation;
use App\Models\TranslationGroup;
use App\Models\Word;

class MyDictionaryController extends Controller
{
    public function newWord(NewWordRequest $request)
    {
        return app('db')->transaction(function () use($request) {
            $word = new Word();
            $word->writing = $request->word;
            $word->root = $request->root;
            $word->author_id = auth()->user()->getAuthIdentifier(); // todo: move to observer
            $word->language_part_id = $request->languagePart;
            $word->saveOrFail();
            foreach ($request->sense as $sense) {
                $group = new TranslationGroup();
                $group->explanation = $sense->name;
                $group->saveOrFail();
                foreach ($sense->translation as $mean) {
                    $translation = new Translation();
                    $translation->text = $mean->word;
                    $translation->is_figurative = $mean->isFigurative;
                    $translation->is_conversational = $mean->isConversational;
                    $translation->explanation = $mean->explanation;
                    $translation->applying_style_id = $mean->applyingStyle;
                    $translation->group_id = $group->id;
                    $translation->translated_word_id = $word->id;
                    $translation->saveOrFail();
                    $translation->setRelation('group', $group);
                    $word->translations->push($translation); // todo: check this approach
                }
            }

            return response()->json([
                'model' => $word
            ]);
        });
    }
}