<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Eloquent\Word
 *
 * @property int $id
 * @property string $writing
 * @property string $root
 * @property int $author_id
 * @property int $language_part_id
 * @mixin \Eloquent
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Eloquent\Translation[] $translations
 */
class Word extends Model
{
    public function translations()
    {
        return $this->hasMany(Translation::class);
    }
}
