<?php
/**
 * Created by PhpStorm.
 * User: tsamsiyu
 * Date: 06.01.18
 * Time: 21:55
 */

namespace App\Http\Handlers;


use App\Data\FileDb\Languages;
use App\Models\Eloquent\OriginalDictum;
use App\Models\Eloquent\TranslatedDictum;
use App\Models\Eloquent\TranslatedDictumGroup;

class TranslationSaveHandler
{
    /**
     * @param $data
     * @return OriginalDictum
     */
    public function create($data)
    {
        return $this->save(new OriginalDictum(), $data);
    }

    /**
     * @param OriginalDictum $dictum
     * @param $data
     * @return OriginalDictum
     */
    public function update(OriginalDictum $dictum, $data)
    {
        return $this->save($dictum, $data);
    }

    private function save(OriginalDictum $origin, array $data)
    {
        return app('db')->transaction(function () use($origin, $data) {
            $type = array_get($data, 'dataType');

            $origin->spelling = array_get($data, 'spelling');
            $origin->author_id = auth()->user()->getAuthIdentifier();
            $origin->language_id = Languages::EN;
            // TODO: fix bug with removing existed relations
            $origin->saveOrFail();

            if ($type === 'complex') {
                $rawGroups = array_get($data, 'translation_groups');
                $this->handleGroups($rawGroups, $origin);
            } else {
                $rawTranslations = array_get($data, 'translations');
                $this->handleTranslations($rawTranslations, $origin);
            }

            return $origin;
        });
    }

    private function handleGroups($rawGroups, OriginalDictum $origin)
    {
        foreach ($rawGroups as $rawGroup) {
            if ($origin->wasRecentlyCreated || !isset($rawGroup['id'])) {
                $group = new TranslatedDictumGroup();
            } else {
                $group = $origin->translationGroups->find($rawGroup['id']);
            }
            $group->explanation = array_get($rawGroup, 'explanation');
            $group->original_dictum_id = $origin->id;
            $group->saveOrFail();
            $rawTranslations = array_get($rawGroup, 'translations');
            $this->handleTranslations($rawTranslations, $origin, $group);
            if ($group->wasRecentlyCreated) {
                $origin->translationGroups->push($group);
            }
        }
    }

    private function handleTranslations($rawTranslations, OriginalDictum $origin, TranslatedDictumGroup $group = null)
    {
        foreach ($rawTranslations as $rawTranslation) {
            if ($origin->wasRecentlyCreated || !isset($rawTranslation['id'])) {
                $translation = new TranslatedDictum();
            } else {
                $translation = $origin->translations->where('id', $rawTranslation['id'])->first();
            }
            $translation->spelling = array_get($rawTranslation, 'spelling');
            $translation->original_dictum_id = $origin->id;
            $translation->language_id = Languages::RU;
            $translation->saveOrFail();
            if ($group) {
                $translation->group_id = $group->id;
            }

            if ($translation->wasRecentlyCreated) {
                $origin->translations->push($translation);
            }
        }
    }
}