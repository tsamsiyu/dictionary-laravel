<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Eloquent\TranslatedDictum
 *
 * @property int id
 * @property string spelling
 * @property int group_id
 * @property int word_id
 *
 * @property-read \App\Models\Eloquent\TranslatedDictumGroup $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Eloquent\OriginalDictum[] $origin
 * @mixin \Eloquent
 */
class TranslatedDictum extends Model
{
    public function group()
    {
        return $this->hasOne(TranslatedDictumGroup::class);
    }

    public function origin()
    {
        return $this->hasMany(OriginalDictum::class);
    }
}
