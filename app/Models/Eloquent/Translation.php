<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Eloquent\Translation
 *
 * @property int $id
 * @property string $text
 * @property bool $is_figurative
 * @property bool $is_conversational
 * @property string $explanation
 * @property string $image_src
 * @property int $frequency_usage
 * @property int $applying_style_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @mixin \Eloquent
 * @property int $group_id
 * @property int $translated_word_id
 * @property-read \App\Models\Eloquent\TranslationGroup $group
 */
class Translation extends Model
{
    public function group()
    {
        return $this->hasOne(TranslationGroup::class);
    }
}
