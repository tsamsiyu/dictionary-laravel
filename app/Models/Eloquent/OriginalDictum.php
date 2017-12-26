<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Eloquent\OriginalDictum
 *
 * @property int id
 * @property string spelling
 * @property int author_id
 * @property int language_id
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Eloquent\TranslatedDictumGroup[] $translationGroups
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Eloquent\TranslatedDictum[] $translations
 * @mixin \Eloquent
 */
class OriginalDictum extends Model
{
    public function translations()
    {
        return $this->hasMany(TranslatedDictum::class);
    }

    public function translationGroups()
    {
        return $this->hasMany(TranslatedDictumGroup::class);
    }
}