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
 * @property-read \App\Models\Eloquent\OriginalDictum $originalDictum
 * @mixin \Eloquent
 */
class TranslatedDictumGroup extends Model
{
    public function originalDictum()
    {
        return $this->hasOne(OriginalDictum::class);
    }
}
