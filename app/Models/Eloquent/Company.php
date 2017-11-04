<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Company
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $jurisdiction_id
 * @property string $activity
 * @property string $registration_number
 * @property string $registration_date
 * @property string $account_due_date
 * @property string $incorporation_date
 * @property int $year_end
 * @property string $information_notes
 * @property string $treasury_notes
 * @property string $auditors
 * @property string $agents
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $author_id
 */
class Company extends Model
{
    //
}
