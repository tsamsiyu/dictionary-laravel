<?php
/**
 * Created by PhpStorm.
 * User: tsamsiyu
 * Date: 02.11.17
 * Time: 23:06
 */

namespace App\Http\Controllers\Frontend;

use App\Core\Controller;
use App\Http\Requests\TranslationSaveRequest;
use App\Models\Eloquent\TranslatedDictum;
use App\Models\Eloquent\OriginalDictum;
use App\Data\FileDb\Languages;
use App\Models\Eloquent\TranslatedDictumGroup;

class DictaController extends Controller
{
    public function search()
    {
        $models = OriginalDictum::query()
            ->with('translationGroups')
            ->with('translations')
            ->get();

        return response()->json(['data' => $models]);
    }

    public function create(TranslationSaveRequest $request)
    {
        return app('db')->transaction(function () use($request) {
            $data = $request->all();

            $origin = new OriginalDictum();
            $origin->spelling = array_get($data, 'spelling');
            $origin->author_id = auth()->user()->getAuthIdentifier(); // todo: move to observer
            $origin->language_id = Languages::EN;
            $origin->setRelation('translations', collect());
            $origin->setRelation('translationGroups', collect());
            $origin->saveOrFail();

            $rawGroups = array_get($data, 'groups');

            foreach ($rawGroups as $rawGroup) {
                $groupExplanation = array_get($rawGroup, 'explanation');

                if ($groupExplanation) {
                    $group = new TranslatedDictumGroup();
                    $group->explanation = $groupExplanation;
                    $group->original_dictum_id = $origin->id;
                    $group->saveOrFail();
                    $origin->translationGroups->push($group);
                } else {
                    $group = null;
                }

                $rawTranslations = array_get($rawGroup, 'translations');

                foreach ($rawTranslations as $rawTranslation) {
                    $translation = new TranslatedDictum();
                    $translation->spelling = array_get($rawTranslation, 'spelling');
                    $translation->word_id = $origin->id;
                    if ($group) {
                        $translation->group_id = $group->id;
                    }
                    $translation->saveOrFail();
                    $origin->translations->push($translation);
                }
            }

            return response()->json([
                'data' => $origin
            ]);
        });
    }
}