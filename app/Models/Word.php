<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Word
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Translation[] $translations
 */
class Word extends Model
{
    public function translations()
    {
        return $this->hasMany(Translation::class);
    }
}
