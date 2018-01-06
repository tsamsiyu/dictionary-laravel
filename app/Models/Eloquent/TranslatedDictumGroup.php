<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Eloquent\TranslatedDictumGroup
 *
 * @property int $id
 * @property string $explanation
 * @property int $original_dictum_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Eloquent\OriginalDictum $original
 * @property-read \App\Models\Eloquent\TranslatedDictum[]|\Illuminate\Database\Eloquent\Collection $translations
 * @mixin \Eloquent
 */
class TranslatedDictumGroup extends Model
{
    public function original()
    {
        return $this->hasOne(OriginalDictum::class);
    }

    public function translations()
    {
        return $this->hasMany(TranslatedDictum::class, 'group_id', 'id');
    }
}
